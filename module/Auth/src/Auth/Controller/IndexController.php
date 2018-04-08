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
use Zend\Mvc\Controller\AbstractActionController;
use Zend\Session\SessionManager;
use Zend\View\Model\ViewModel;

/**
 * Index controller
 */
class IndexController extends AbstractActionController
{
    /**
     *
     * @var ModuleOptions
     */
    protected $options;

    /**
     *
     * @var Doctrine\ORM\EntityManager
     */
    protected $entityManager;

    /**
     *
     * @var Zend\Mvc\I18n\Translator
     */
    protected $translatorHelper;

    /**
     *
     * @var Zend\Form\Form
     */
    protected $userFormHelper;

    /**
     * Index action
     *
     * The method show to users they are guests
     *
     * @return Zend\View\Model\ViewModelarray navigation menu
     */
    public function indexAction()
    {
        return new ViewModel (array(
            'navMenu' => $this->getOptions()->getNavMenu()
        ));
    }

    /**
     * get options
     *
     * @return ModuleOptions
     */
    private function getOptions()
    {
        if ($this->options === null) {
            $this->options = $this->getServiceLocator()->get('auth_module_options');
        }

        return $this->options;
    }

    /**
     * Log in action
     *
     * The method uses Doctrine Entity Manager to authenticate the input data
     *
     * @return \Zend\View\Model\ViewModel array form|array messages|array navigation menu
     */
    public function loginAction()
    {

        // If the User is already logged in: Redirect to requested route
        if ($user = $this->identity()) {
            return $this->redirect()->toRoute($this->getOptions()->getLoginRedirectRoute());
        }

        // Create a user and form
        $user     = new User();
        $form     = $this->getUserFormHelper()->createUserForm($user, 'login');
        $messages = null;

        if ($this->getRequest()->isPost()) {
            $form->setValidationGroup('usernameOrEmail', 'password', 'rememberme', 'csrf', 'captcha');
            $form->setData($this->getRequest()->getPost());

            if ($form->isValid()) {
                $data            = $form->getData();
                $authService     = $this->getServiceLocator()->get('Zend\Authentication\AuthenticationService');
                $adapter         = $authService->getAdapter();
                $usernameOrEmail = $this->params()->fromPost('usernameOrEmail');

                try {
                    $user = $this->getEntityManager()
                                 ->createQuery("SELECT u FROM Auth\Entity\User u WHERE u.email = '$usernameOrEmail' OR u.username = '$usernameOrEmail'")
                                 ->getResult(\Doctrine\ORM\Query::HYDRATE_OBJECT);
                    $user = $user[0];

                    if (!isset($user)) {
                        return new ViewModel(array(
                            'error'    => $this->getTranslatorHelper()->translate('auth.login.credentials.invalid'),
                            'form'     => $form,
                            'messages' => $messages,
                            'navMenu'  => $this->getOptions()->getNavMenu()
                        ));
                    }

                    $adapter->setIdentityValue($user->getUsername());
                    $adapter->setCredentialValue($this->params()->fromPost('password'));

                    $authResult = $authService->authenticate();
                    if ($authResult->isValid()) {
                        $identity = $authResult->getIdentity();
                        $authService->getStorage()->write($identity);

                        if ($this->params()->fromPost('rememberme')) {
                            $time           = 1209600; // 14 days (1209600/3600 = 336 hours => 336/24 = 14 days)
                            $sessionManager = new SessionManager();
                            $sessionManager->rememberMe($time);
                        }

                        return $this->redirect()->toRoute($this->getOptions()->getLoginRedirectRoute());
                    }

                    foreach ($authResult->getMessages() as $message) {
                        $messages .= "$message\n";
                    }
                } catch (\Exception $e) {
                    return $this->getServiceLocator()->get('auth_error_view')
                                ->createErrorView($this->getTranslatorHelper()->translate('auth.login.problem'), $e,
                                    $this->getOptions()->getDisplayExceptions(), $this->getOptions()->getNavMenu());
                }
            }
        }

        return new ViewModel(array(
            'error'    => $this->getTranslatorHelper()->translate('auth.login.credentials.invalid'),
            'form'     => $form,
            'messages' => $messages,
            'navMenu'  => $this->getOptions()->getNavMenu()
        ));
    }

    /**
     * get userFormHelper
     *
     * @return Zend\Form\Form
     */
    private function getUserFormHelper()
    {
        if ($this->userFormHelper === null) {
            $this->userFormHelper = $this->getServiceLocator()->get('auth_user_form');
        }

        return $this->userFormHelper;
    }

    /**
     * get entityManager
     *
     * @return EntityManager
     */
    private function getEntityManager()
    {
        if ($this->entityManager === null) {
            $this->entityManager = $this->getServiceLocator()->get('doctrine.entitymanager.orm_default');
        }

        return $this->entityManager;
    }

    /**
     * get translatorHelper
     *
     * @return Zend\Mvc\I18n\Translator
     */
    private function getTranslatorHelper()
    {
        if ($this->translatorHelper === null) {
            $this->translatorHelper = $this->getServiceLocator()->get('MvcTranslator');
        }

        return $this->translatorHelper;
    }

    /**
     * Log out action
     *
     * The method destroys session for a logged user
     *
     * @return redirect to specific action
     */
    public function logoutAction()
    {
        $auth = $this->getServiceLocator()->get('Zend\Authentication\AuthenticationService');
        if ($auth->hasIdentity()) {
            $auth->clearIdentity();
            $sessionManager = new SessionManager();
            $sessionManager->forgetMe();
        }

        return $this->redirect()->toRoute($this->getOptions()->getLogoutRedirectRoute());
    }
}
