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
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

/**
 * Admn controller
 */
class AdminController extends AbstractActionController
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
     * Method to show an user list
     *
     * @return Zend\View\Model\ViewModel
     */
    public function indexAction()
    {
        if (!$this->identity()) {
            return $this->redirect()->toRoute($this->getOptions()->getLoginRedirectRoute());
        }

        $users = $this->getEntityManager()->getRepository('Auth\Entity\User')->findAll();

        return new ViewModel(array(
            'users' => $users
        ));
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
     * get entityManager
     *
     * @return EntityManager
     */
    private function getEntityManager()
    {
        if (null === $this->entityManager) {
            $this->entityManager = $this->getServiceLocator()->get('doctrine.entitymanager.orm_default');
        }

        return $this->entityManager;
    }

    /**
     * Create action
     *
     * Method to create an user
     *
     * @return Zend\View\Model\ViewModel
     */
    public function createUserAction()
    {

        /* @var $user \Auth\Entity\User */
        if (!$this->identity()) {
            return $this->redirect()->toRoute($this->getOptions()->getLoginRedirectRoute());
        }

        try {
            $user    = new User();
            $form    = $this->getUserFormHelper()->createUserForm($user, 'CreateUser');
            $request = $this->getRequest();
            if ($request->isPost()) {
                $form->setValidationGroup('username', 'email', 'name', 'password', 'passwordVerify', 'usergroup',
                    'question', 'answer', 'csrf');
                $form->setData($request->getPost());
                if ($form->isValid()) {
                    $entityManager = $this->getEntityManager();
                    $user->setConfirmed(true);
                    $user->setRegistered(new \DateTime());
                    $user->setToken(md5(uniqid(mt_rand(), true)));
                    $user->setPassword(UserCredentialsService::encryptPassword($user->getPassword()));
                    $user->setActive(false);
                    $user->setSysCreator(0);
                    $user->setSysAuthor(0);

                    $entityManager->persist($user);
                    $entityManager->flush();
                    $this->flashMessenger()->addSuccessMessage($this->getTranslatorHelper()
                                                                    ->translate('auth.admin.create.success'));

                    return $this->redirect()->toRoute('user-admin');
                }
            }
        } catch (\Exception $e) {
            return $this->getServiceLocator()->get('auth_error_view')->createErrorView($this->getTranslatorHelper()
                                                                                            ->translate('auth.admin.create.failure'),
                $e, $this->getOptions()->getDisplayExceptions(), false);
        }

        $viewModel = new ViewModel(array(
            'form' => $form
        ));
        $viewModel->setTemplate('auth/admin/new-user-form');

        return $viewModel;
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
     * Edit action
     *
     * Method to update an user
     *
     * @return Zend\View\Model\ViewModel
     */
    public function editUserAction()
    {
        if (!$this->identity()) {
            return $this->redirect()->toRoute($this->getOptions()->getLoginRedirectRoute());
        }

        try {
            $id = (int)$this->params()->fromRoute('id', 0);

            if ($id == 0) {
                $this->flashMessenger()->addErrorMessage($this->getTranslatorHelper()
                                                              ->translate('auth.admin.update.id.invalid'));

                return $this->redirect()->toRoute('user-admin');
            }

            $entityManager = $this->getEntityManager();
            $user          = $entityManager->getRepository('Auth\Entity\User')->find($id);

            $form = $this->getUserFormHelper()->createUserForm($user, 'EditUser');

            $form->setAttributes(array(
                'action' => $this->url()->fromRoute('user-admin', array(
                    'action' => 'edit-user',
                    'id'     => $id
                ))
            ));

            $request = $this->getRequest();
            if ($request->isPost()) {
                $form->setValidationGroup('username', 'email', 'firstName', 'lastName', 'language', 'state', 'role',
                    'question', 'answer', 'csrf');
                $form->setData($request->getPost());
                if ($form->isValid()) {
                    $entityManager->persist($user);
                    $entityManager->flush();
                    $this->flashMessenger()->addSuccessMessage($this->getTranslatorHelper()
                                                                    ->translate('auth.admin.update.success'));

                    return $this->redirect()->toRoute('user-admin');
                }
            }
        } catch (\Exception $e) {
            return $this->getServiceLocator()->get('auth_error_view')->createErrorView($this->getTranslatorHelper()
                                                                                            ->translate('auth.admin.update.failure'),
                $e, $this->getOptions()->getDisplayExceptions(), false);
        }

        $viewModel = new ViewModel(array(
            'form'        => $form,
            'headerLabel' => $this->getTranslatorHelper()->translate('auth.label.edit.user').' - '.$user->getName()
        ));
        $viewModel->setTemplate('auth/admin/edit-user-form');

        return $viewModel;
    }

    /**
     * Delete action
     *
     * Method to delete an user from his ID
     *
     * @return Zend\View\Model\ViewModel
     */
    public function deleteUserAction()
    {
        if (!$this->identity()) {
            return $this->redirect()->toRoute($this->getOptions()->getLoginRedirectRoute());
        }

        $id = (int)$this->params()->fromRoute('id', 0);

        if ($id == 0) {
            $this->flashMessenger()->addErrorMessage($this->getTranslatorHelper()
                                                          ->translate('auth.admin.delete.id.invalid'));

            return $this->redirect()->toRoute('user-admin');
        }

        try {
            $entityManager = $this->getEntityManager();
            $user          = $entityManager->getRepository('Auth\Entity\User')->find($id);
            $entityManager->remove($user);
            $entityManager->flush();
            $this->flashMessenger()->addSuccessMessage($this->getTranslatorHelper()
                                                            ->translate('auth.admin.delete.success'));
        } catch (\Exception $e) {
            return $this->getServiceLocator()->get('auth_error_view')->createErrorView($this->getTranslatorHelper()
                                                                                            ->translate('auth.admin.delete.failure'),
                $e, $this->getOptions()->getDisplayExceptions(), false);
        }

        return $this->redirect()->toRoute('user-admin');
    }

    /**
     * Disable action
     *
     * Method to disable an user from his ID
     *
     * @return Zend\View\Model\ViewModel
     */
    public function setUserStateAction()
    {
        /* @var $user \Auth\Entity\User */
        if (!$this->identity()) {
            return $this->redirect()->toRoute($this->getOptions()->getLoginRedirectRoute());
        }

        $id    = (int)$this->params()->fromRoute('id', 0);
        $state = (int)$this->params()->fromRoute('state', -1);

        if (($id === 0) || ($state === -1)) {
            $this->flashMessenger()->addErrorMessage($this->getTranslatorHelper()
                                                          ->translate('auth.admin.enable.id.invalid'));

            return $this->redirect()->toRoute('user-admin');
        }

        try {
            $entityManager = $this->getEntityManager();
            $user          = $entityManager->getRepository('Auth\Entity\User')->find($id);
            $user->setActive($state > 0);
            $entityManager->persist($user);
            $entityManager->flush();
            $this->flashMessenger()->addSuccessMessage($this->getTranslatorHelper()
                                                            ->translate('auth.admin.enable.success'));
        } catch (\Exception $e) {
            return $this->getServiceLocator()->get('auth_error_view')->createErrorView($this->getTranslatorHelper()
                                                                                            ->translate('auth.admin.enable.failure'),
                $e, $this->getOptions()->getDisplayExceptions(), false);
        }

        return $this->redirect()->toRoute('user-admin');
    }
}