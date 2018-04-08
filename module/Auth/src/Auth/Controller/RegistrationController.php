<?php

/**
 * Event management
 *
 * @category       Tollwerk
 * @package        Tollwerk_Events
 * @author         Joschi Kuphal <joschi@kuphal.net>
 * @copyright      Copyright © 2014 tollwerk GmbH <info@tollwerk.de>
 * @license        http://opensource.org/licenses/BSD-3-Clause	The BSD 3-Clause License
 */

namespace Auth\Controller;

use Auth\Entity\User;
use Auth\Options\ModuleOptions;
use Auth\Service\UserService as UserCredentialsService;
use Zend\Mail\Message;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\Validator\Identical as IdenticalValidator;
use Zend\View\Model\ViewModel;

/**
 * Registration controller
 */
class RegistrationController extends AbstractActionController
{
    /**
     * Module Options
     *
     * @var \Auth\Options\ModuleOptions
     */
    protected $options;

    /**
     * Doctrine entity manager
     *
     * @var \Doctrine\ORM\EntityManager
     */
    protected $entityManager;

    /**
     * Zend translator
     *
     * @var \Zend\Mvc\I18n\Translator
     */
    protected $translatorHelper;

    /**
     * Form helper
     *
     * @var \Zend\Form\Form
     */
    protected $userFormHelper;

    /**
     * Main user registration
     *
     * Creates a registration form using Doctrine ORM and Zend annotations
     *
     * @return Zend\View\Model\ViewModel        View model
     */
    public function indexAction()
    {
        if ($this->identity()) {
            return $this->redirect()->toRoute($this->getOptions()->getLoginRedirectRoute());
        }

        $user = new User();
        $form = $this->getUserFormHelper()->createUserForm($user, 'SignUp');
        if ($this->getRequest()->isPost()) {
            $form->setValidationGroup('username', 'email', 'name', 'password', 'passwordVerify', 'question',
                'usergroup', 'answer', 'csrf', 'captcha');
            $form->setData($this->getRequest()->getPost());

            if ($form->isValid()) {
                $entityManager = $this->getEntityManager();
                $user->setConfirmed(false);
                $user->setRegistered(new \DateTime());
                $user->setToken(md5(uniqid(mt_rand(), true)));
                $user->setPassword(UserCredentialsService::encryptPassword($user->getPassword()));
                $user->setActive(false);
                $user->setRole(0);
                $user->setSysCreator(0);
                $user->setSysAuthor(0);

                try {
                    $fullLink = $this->getBaseUrl().$this->url()->fromRoute('user-register', array(
                            'action' => 'confirm-email',
                            'id'     => $user->getToken()
                        ));
                    $this->sendEmail($user->getEmail(),
                        $this->getTranslatorHelper()->translate('auth.register.confirm.email.subject'),
                        sprintf($this->getTranslatorHelper()->translate('auth.register.confirm.email.body'),
                            $fullLink));

                    $entityManager->persist($user);
                    $entityManager->flush();

                    $viewModel = new ViewModel(array(
                        'email'   => $user->getEmail(),
                        'navMenu' => $this->getOptions()->getNavMenu()
                    ));
                    $viewModel->setTemplate('auth/registration/registration-success');

                    return $viewModel;

                } catch (\Exception $e) {
                    return $this->getServiceLocator()->get('auth_error_view')
                                ->createErrorView($this->getTranslatorHelper()
                                                       ->translate('auth.register.confirm.email.failure'), $e,
                                    $this->getOptions()->getDisplayExceptions(), $this->getOptions()->getNavMenu());
                }
            }
        }

        $viewModel = new ViewModel(array(
            'form'    => $form,
            'navMenu' => $this->getOptions()->getNavMenu()
        ));
        $viewModel->setTemplate('auth/registration/registration');

        return $viewModel;
    }

    /**
     * get options
     *
     * @return ModuleOptions
     */
    private function getOptions()
    {
        if (null === $this->options) {
            $this->options = $this->getServiceLocator()->get('auth_module_options');
        }

        return $this->options;
    }

    /**
     * get userFormHelper
     *
     * @return Zend\Form\Form
     */
    private function getUserFormHelper()
    {
        if (null === $this->userFormHelper) {
            $this->userFormHelper = $this->getServiceLocator()->get('auth_user_form');
        }

        return $this->userFormHelper;
    }

    /**
     * get entityManager
     *
     * @return Doctrine\ORM\EntityManager
     */
    private function getEntityManager()
    {
        if (null === $this->entityManager) {
            $this->entityManager = $this->getServiceLocator()->get('doctrine.entitymanager.orm_default');
        }

        return $this->entityManager;
    }

    /**
     * Get Base Url
     *
     * Get Base App Url
     */
    private function getBaseUrl()
    {
        $uri = $this->getRequest()->getUri();

        return sprintf('%s://%s', $uri->getScheme(), $uri->getHost());
    }

    /**
     * Send Email
     *
     * Sends plain text emails
     */
    private function sendEmail($to = '', $subject = '', $messageText = '')
    {
        $transport = $this->getServiceLocator()->get('mail.transport');
        $message   = new Message();

        $message->addTo($to)->addFrom($this->getOptions()->getSenderEmailAdress())->setSubject($subject)
                ->setBody($messageText);

        $transport->send($message);
    }

    /**
     * get translatorHelper
     *
     * @return Zend\Mvc\I18n\Translator
     */
    private function getTranslatorHelper()
    {
        if (null === $this->translatorHelper) {
            $this->translatorHelper = $this->getServiceLocator()->get('MvcTranslator');
        }

        return $this->translatorHelper;
    }

    /**
     * Edit Profile Action
     *
     * Displays user edit profile form
     *
     * @return \Zend\View\Model\ViewModel        View model
     */
    public function editProfileAction()
    {
        /* @var $user \Auth\Entity\User */
        if (!$user = $this->identity()) {
            return $this->redirect()->toRoute($this->getOptions()->getLoginRedirectRoute());
        }

        $form     = $this->getUserFormHelper()->createUserForm($user, 'EditProfile');
        $email    = $user->getEmail();
        $username = $user->getUsername();
        $message  = null;
        if ($this->getRequest()->isPost()) {
            $currentName = $user->getName();
            $form->setValidationGroup('name', 'csrf');
            $form->setData($this->getRequest()->getPost());
            if ($form->isValid()) {
                $name = $this->params()->fromPost('name');
                $user->setName($name);
                $entityManager = $this->getEntityManager();
                $entityManager->persist($user);
                $entityManager->flush();
                $message = $this->getTranslatorHelper()->translate('auth.register.profile.success');
            }
        }

        return new ViewModel(array(
            'form'             => $form,
            'email'            => $email,
            'username'         => $username,
            'securityQuestion' => $user->getQuestion()->getQuestion(),
            'message'          => $message,
            'navMenu'          => $this->getOptions()->getNavMenu()
        ));
    }

    /**
     * Change Email Action
     *
     * Displays user change password form
     *
     * @return Zend\View\Model\ViewModel
     */
    public function changePasswordAction()
    {
        /* @var $user \Auth\Entity\User */
        if (!$user = $this->identity()) {
            return $this->redirect()->toRoute($this->getOptions()->getLoginRedirectRoute());
        }

        $form    = $this->getUserFormHelper()->createUserForm($user, 'ChangePassword');
        $message = null;
        if ($this->getRequest()->isPost()) {
            $currentAnswer = $user->getAnswer();
            $form->setValidationGroup('password', 'newPasswordVerify', 'answer', 'csrf');
            $form->setData($this->getRequest()->getPost());
            if ($form->isValid()) {
                $data               = $form->getData();
                $identicalValidator = new IdenticalValidator(array('token' => $currentAnswer));
                if ($identicalValidator->isValid($data->getAnswer())) {
                    $user->setPassword(UserCredentialsService::encryptPassword($this->params()->fromPost('password')));
                    $entityManager = $this->getEntityManager();
                    $entityManager->persist($user);
                    $entityManager->flush();

                    $viewModel = new ViewModel(array(
                        'navMenu' => $this->getOptions()->getNavMenu()
                    ));
                    $viewModel->setTemplate('auth/registration/change-password-success');

                    return $viewModel;
                } else {
                    $message = $this->getTranslatorHelper()->translate('auth.register.answer.invalid');
                }
            }
        }

        return new ViewModel(array(
            'form'     => $form,
            'navMenu'  => $this->getOptions()->getNavMenu(),
            'message'  => $message,
            'question' => $user->getQuestion()->getQuestion()
        ));
    }

    /**
     * Reset Password Action
     *
     * Send email reset link to user
     *
     * @return Zend\View\Model\ViewModel
     */
    public function resetPasswordAction()
    {
        if ($user = $this->identity()) {
            return $this->redirect()->toRoute($this->getOptions()->getLoginRedirectRoute());
        }

        $user    = new User();
        $form    = $this->getUserFormHelper()->createUserForm($user, 'ResetPassword');
        $message = null;
        if ($this->getRequest()->isPost()) {
            $form->setValidationGroup('csrf', 'captcha');
            $form->setData($this->getRequest()->getPost());
            if ($form->isValid()) {
                $data            = $form->getData();
                $usernameOrEmail = $this->params()->fromPost('usernameOrEmail');
                $entityManager   = $this->getEntityManager();
                $user            = $entityManager->createQuery("SELECT u FROM Auth\Entity\User u WHERE u.email = '$usernameOrEmail' OR u.username = '$usernameOrEmail'")
                                                 ->getResult(\Doctrine\ORM\Query::HYDRATE_OBJECT);
                $user            = $user[0];

                if (isset($user)) {
                    try {
                        $user->setToken(md5(uniqid(mt_rand(), true)));
                        $fullLink = $this->getBaseUrl().$this->url()->fromRoute('user-register', array(
                                'action' => 'confirm-email-change-password',
                                'id'     => $user->getToken()
                            ));
                        $this->sendEmail($user->getEmail(), $this->getTranslatorHelper()
                                                                 ->translate('auth.register.password.change.confirm.email.subject'),
                            sprintf($this->getTranslatorHelper()
                                         ->translate('auth.register.password.change.confirm.email.body'),
                                $user->getUsername(), $fullLink));
                        $entityManager->persist($user);
                        $entityManager->flush();

                        $viewModel = new ViewModel(array(
                            'email'   => $user->getEmail(),
                            'navMenu' => $this->getOptions()->getNavMenu()
                        ));

                        $viewModel->setTemplate('auth/registration/password-change-success');

                        return $viewModel;
                    } catch (\Exception $e) {
                        return $this->getServiceLocator()->get('auth_error_view')
                                    ->createErrorView($this->getTranslatorHelper()
                                                           ->translate('auth.register.password.change.confirm.email.failure'),
                                        $e, $this->getOptions()->getDisplayExceptions(),
                                        $this->getOptions()->getNavMenu());
                    }
                } else {
                    $message = _('auth.register.password.change.id.invalid');
                }
            }
        }

        return new ViewModel(array(
            'form'    => $form,
            'navMenu' => $this->getOptions()->getNavMenu(),
            'message' => $message
        ));
    }

    /**
     * Change Email Action
     *
     * Displays user change email form
     *
     * @return Zend\View\Model\ViewModel
     */
    public function changeEmailAction()
    {
        /* @var $user \Auth\Entity\User */
        if (!$user = $this->identity()) {
            return $this->redirect()->toRoute($this->getOptions()->getLoginRedirectRoute());
        }

        $form    = $this->getUserFormHelper()->createUserForm($user, 'ChangeEmail');
        $message = null;
        if ($this->getRequest()->isPost()) {
            $currentPassword = $user->getPassword();
            $form->setValidationGroup('password', 'newEmail', 'newEmailVerify', 'csrf');
            $form->setData($this->getRequest()->getPost());
            if ($form->isValid()) {
                $data = $form->getData();
                $user->setPassword($currentPassword);
                if (UserCredentialsService::verifyHashedPassword($user, $this->params()->fromPost('password'))) {
                    $newMail       = $this->params()->fromPost('newEmail');
                    $email         = $user->setEmail($newMail);
                    $entityManager = $this->getEntityManager();
                    $entityManager->persist($user);
                    $entityManager->flush();

                    $viewModel = new ViewModel(array(
                        'email'   => $newMail,
                        'navMenu' => $this->getOptions()->getNavMenu()
                    ));
                    $viewModel->setTemplate('auth/registration/change-email-success');

                    return $viewModel;
                } else {
                    $message = $this->getTranslatorHelper()->translate('auth.register.email.change.password.invalid');
                }
            }
        }

        return new ViewModel(array(
            'form'    => $form,
            'navMenu' => $this->getOptions()->getNavMenu(),
            'message' => $message
        ));
    }

    /**
     * Change Security Question
     *
     * Displays user change security question form
     *
     * @return Zend\View\Model\ViewModel
     */
    public function changeSecurityQuestionAction()
    {
        if (!$user = $this->identity()) {
            return $this->redirect()->toRoute($this->getOptions()->getLoginRedirectRoute());
        }

        $form    = $this->getUserFormHelper()->createUserForm($user, 'ChangeSecurityQuestion');
        $message = null;
        if ($this->getRequest()->isPost()) {
            $currentPassword = $user->getPassword();
            $form->setValidationGroup('password', 'question', 'answer', 'csrf');
            $form->setData($this->getRequest()->getPost());
            if ($form->isValid()) {
                $data = $form->getData();
                $user->setPassword($currentPassword);

                if (UserCredentialsService::verifyHashedPassword($user, $this->params()->fromPost('password'))) {
                    $entityManager = $this->getEntityManager();
                    $entityManager->persist($user);
                    $entityManager->flush();

                    $viewModel = new ViewModel(array(
                        'navMenu' => $this->getOptions()->getNavMenu()
                    ));
                    $viewModel->setTemplate('auth/registration/change-security-question-success');

                    return $viewModel;
                } else {
                    $message = $this->getTranslatorHelper()
                                    ->translate('auth.register.question.change.password.invalid');
                }
            }
        }

        return new ViewModel(array(
            'form'               => $form,
            'navMenu'            => $this->getOptions()->getNavMenu(),
            'message'            => $message,
            'questionSelectedId' => $user->getQuestion()->getId()
        ));
    }

    /**
     * Registration confirmation
     *
     * Checks for email validation through given token
     *
     * @return \Zend\View\Model\ViewModel        View model
     */
    public function confirmEmailAction()
    {
        $token = $this->params()->fromRoute('id');
        try {
            $entityManager = $this->getEntityManager();

            /* @var $user \Auth\Entity\User */
            if (($token !== '') && ($user = $entityManager->getRepository('Auth\Entity\User')->findOneBy(array(
                    'token' => $token
                )))) {
                $user->setToken(md5(uniqid(mt_rand(), true)));
                $user->setConfirmed(true);
                $entityManager->persist($user);
                $entityManager->flush();

                $viewModel = new ViewModel(array(
                    'navMenu' => $this->getOptions()->getNavMenu()
                ));
                $viewModel->setTemplate('auth/registration/confirm-email-success');

                return $viewModel;
            } else {
                return $this->redirect()->toRoute('user-index', array(
                    'action' => 'login'
                ));
            }
        } catch (\Exception $e) {
            return $this->getServiceLocator()->get('auth_error_view')->createErrorView($this->getTranslatorHelper()
                                                                                            ->translate('auth.register.activate.failure'),
                $e, $this->getOptions()->getDisplayExceptions(), $this->getOptions()->getNavMenu());
        }
    }

    /**
     * Confirm Email Change Action
     *
     * Confirms password change through given token
     *
     * @return Zend\View\Model\ViewModel
     */
    public function confirmEmailChangePasswordAction()
    {
        $token = $this->params()->fromRoute('id');
        try {
            $entityManager = $this->getEntityManager();
            if ($token !== '' && $user = $entityManager->getRepository('Auth\Entity\User')->findOneBy(array(
                    'token' => $token
                ))) {
                $user->setToken(md5(uniqid(mt_rand(), true)));
                $password = $this->generatePassword();
                $user->setPassword(UserCredentialsService::encryptPassword($password));
                $email    = $user->getEmail();
                $fullLink = $this->getBaseUrl().$this->url()->fromRoute('user-index', array(
                        'action' => 'login'
                    ));
                $this->sendEmail($user->getEmail(),
                    $this->getTranslatorHelper()->translate('auth.register.email.change.email.subject'),
                    sprintf($this->getTranslatorHelper()->translate('auth.register.email.change.email.body'),
                        $user->getUsername(), $password, $fullLink));

                $entityManager->persist($user);
                $entityManager->flush();

                $viewModel = new ViewModel(array(
                    'email'   => $email,
                    'navMenu' => $this->getOptions()->getNavMenu()
                ));

                return $viewModel;
            } else {
                return $this->redirect()->toRoute('user-index');
            }
        } catch (\Exception $e) {
            return $this->getServiceLocator()->get('auth_error_view')->createErrorView($this->getTranslatorHelper()
                                                                                            ->translate('auth.register.email.change.failure'),
                $e, $this->getOptions()->getDisplayExceptions(), $this->getOptions()->getNavMenu());
        }
    }

    /**
     * Generate Password
     *
     * Generates random password
     *
     * @return String
     */
    private function generatePassword($l = 8, $c = 0, $n = 0, $s = 0)
    {
        $count = $c + $n + $s;
        $out   = '';
        if (!is_int($l) || !is_int($c) || !is_int($n) || !is_int($s)) {
            trigger_error('Argument(s) not an integer', E_USER_WARNING);

            return false;
        } elseif ($l < 0 || $l > 20 || $c < 0 || $n < 0 || $s < 0) {
            trigger_error('Argument(s) out of range', E_USER_WARNING);

            return false;
        } elseif ($c > $l) {
            trigger_error('Number of password capitals required exceeds password length', E_USER_WARNING);

            return false;
        } elseif ($n > $l) {
            trigger_error('Number of password numerals exceeds password length', E_USER_WARNING);

            return false;
        } elseif ($s > $l) {
            trigger_error('Number of password capitals exceeds password length', E_USER_WARNING);

            return false;
        } elseif ($count > $l) {
            trigger_error('Number of password special characters exceeds specified password length', E_USER_WARNING);

            return false;
        }

        $chars = "abcdefghijklmnopqrstuvwxyz";
        $caps  = strtoupper($chars);
        $nums  = "0123456789";
        $syms  = "!@#$%^&*()-+?";

        for ($i = 0; $i < $l; $i++) {
            $out .= substr($chars, mt_rand(0, strlen($chars) - 1), 1);
        }

        if ($count) {
            $tmp1 = str_split($out);
            $tmp2 = array();

            for ($i = 0; $i < $c; $i++) {
                array_push($tmp2, substr($caps, mt_rand(0, strlen($caps) - 1), 1));
            }

            for ($i = 0; $i < $n; $i++) {
                array_push($tmp2, substr($nums, mt_rand(0, strlen($nums) - 1), 1));
            }

            for ($i = 0; $i < $s; $i++) {
                array_push($tmp2, substr($syms, mt_rand(0, strlen($syms) - 1), 1));
            }

            $tmp1 = array_slice($tmp1, 0, $l - $count);
            $tmp1 = array_merge($tmp1, $tmp2);
            shuffle($tmp1);
            $out = implode('', $tmp1);
        }

        return $out;
    }
}
