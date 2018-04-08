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

namespace Auth\Service\Factory;

use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;
use DoctrineModule\Validator\NoObjectExists as NoObjectExistsValidator;
use DoctrineORMModule\Form\Annotation\AnnotationBuilder as DoctrineAnnotationBuilder;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class UserFormFactory implements FactoryInterface
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
     * @var Zend\Mvc\I18n\Translator
     */
    protected $url;
    /**
     *
     * @var Zend\Form\Form
     */
    private $form;
    /**
     *
     * @var ServiceLocatorInterface
     */
    private $serviceLocator;

    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $this->serviceLocator = $serviceLocator;

        return $this;
    }

    /**
     * Create admin user form
     *
     * Method to create the Doctrine ORM user form for edit/create users
     *
     * @return Zend\Form\Form
     */
    public function createUserForm($userEntity, $formName = 'LogIn')
    {
        $entityManager = $this->getEntityManager();
        $builder       = new DoctrineAnnotationBuilder($entityManager);
        $this->form    = $builder->createForm($userEntity);
        $this->form->setHydrator(new DoctrineHydrator($entityManager));
        $this->form->setAttribute('method', 'post');

        $this->addCommonFields();

        switch ($formName) {
            case 'SignUp':
                $this->addSignUpFields();
                $this->addSignUpFilters();
                $this->form->setAttributes(array(
                    'action' => $this->getUrlPlugin()->fromRoute('user-register'),
                    'name'   => 'register'
                ));
                break;

            case 'EditProfile':
                $this->form->setAttributes(array(
                    'action' => $this->getUrlPlugin()->fromRoute('user-register', array(
                        'action' => 'edit-profile'
                    )),
                    'name'   => 'edit-profile'
                ));
                break;

            case 'ChangePassword':
                $this->addChangePasswordFields();
                $this->addChangePasswordFilters();
                $this->form->setAttributes(array(
                    'action' => $this->getUrlPlugin()->fromRoute('user-register', array(
                        'action' => 'change-password'
                    )),
                    'name'   => 'change-password'
                ));
                break;

            case 'ResetPassword':
                $this->addResetPasswordFields();
                $this->addResetPasswordFilters();
                $this->form->setAttributes(array(
                    'action' => $this->getUrlPlugin()->fromRoute('user-register', array(
                        'action' => 'reset-password'
                    )),
                    'name'   => 'reset-password'
                ));
                break;

            case 'ChangeEmail':
                $this->addChangeEmailFields();
                $this->addChangeEmailFilters();
                $this->form->setAttributes(array(
                    'action' => $this->getUrlPlugin()->fromRoute('user-register', array(
                        'action' => 'change-email'
                    )),
                    'name'   => 'change-email'
                ));
                break;

            case 'ChangeSecurityQuestion':
                $this->form->setAttributes(array(
                    'action' => $this->getUrlPlugin()->fromRoute('user-register', array(
                        'action' => 'change-security-question'
                    )),
                    'name'   => 'change-security-question'
                ));
                break;

            case 'CreateUser':
                $this->addCreateUserFields();
                $this->addCreateUserFilters();
                $this->form->setAttributes(array(
                    'action' => $this->getUrlPlugin()->fromRoute('user-admin', array(
                        'action' => 'create-user'
                    )),
                    'name'   => 'register'
                ));
                break;

            case 'EditUser':
                $this->form->setAttributes(array(
                    'name' => 'register'
                ));
                break;

            default:
                $this->addLoginFields();
                $this->addLoginFilters();
                $this->form->setAttributes(array(
                    'action' => $this->getUrlPlugin()->fromRoute('user-index', array(
                        'action' => 'login'
                    )),
                    'name'   => 'login'
                ));
                break;
        }

        $this->form->bind($userEntity);

        return $this->form;
    }

    /**
     * get entityManager
     *
     * @return Doctrine\ORM\EntityManager
     */
    private function getEntityManager()
    {
        if (null === $this->entityManager) {
            $this->entityManager = $this->serviceLocator->get('doctrine.entitymanager.orm_default');
        }

        return $this->entityManager;
    }

    /**
     * Common Fields
     */
    private function addCommonFields()
    {
        $this->form->add(array(
            'name'    => 'csrf',
            'type'    => 'Zend\Form\Element\Csrf',
            'options' => array(
                'csrf_options' => array(
                    'timeout' => 600
                )
            )
        ));

        $this->form->add(array(
            'name'       => 'username',
            'type'       => 'Zend\Form\Element\Text',
            'attributes' => array(
                'type' => 'text'
            )
        ));

        $this->form->add(array(
            'name'       => 'password',
            'type'       => 'Zend\Form\Element\Password',
            'attributes' => array(
                'required' => true,
                'type'     => 'password'
            )
        ));

        $this->form->add(array(
            'name'       => 'email',
            'type'       => 'Zend\Form\Element\Text',
            'attributes' => array(
                'type' => 'email'
            )
        ));

        $this->form->add(array(
            'name'    => 'question',
            'type'    => 'DoctrineModule\Form\Element\ObjectSelect',
            'options' => array(
                'object_manager' => $this->getEntityManager(),
                'target_class'   => 'Auth\Entity\Question',
                'property'       => 'question',
            ),
        ));

        $this->form->add(array(
            'name'       => 'answer',
            'type'       => 'Zend\Form\Element\Text',
            'attributes' => array(
                'type' => 'text'
            )
        ));

        $this->form->add(array(
            'name'       => 'name',
            'type'       => 'Zend\Form\Element\Text',
            'attributes' => array(
                'required' => true,
                'type'     => 'text'
            )
        ));

        $this->form->add(array(
            'name'       => 'role',
            'type'       => 'Zend\Form\Element\Select',
            'attributes' => array(
                'required'      => true,
                'value_options' => array(
                    0 => $this->getTranslatorHelper()->translate('auth.label.role.0'),
                    1 => $this->getTranslatorHelper()->translate('auth.label.role.1'),
                )
            )
        ));

        $this->form->add(array(
            'name'    => 'captcha',
            'type'    => 'Zend\Form\Element\Captcha',
            'options' => array(
// 				'captcha'		=> new \Zend\Captcha\Dumb()
                'captcha' => new \Zend\Captcha\Figlet(array(
                    'wordLen' => $this->getOptions()->getCaptchaCharNum()
                ))
            )
        ));

        $this->form->add(array(
            'name'    => 'usergroup',
            'type'    => 'DoctrineModule\Form\Element\ObjectSelect',
            'options' => array(
                'object_manager' => $this->getEntityManager(),
                'target_class'   => 'Auth\Entity\Usergroup',
                'property'       => 'name',
            ),
        ));

        $this->form->add(array(
            'name'       => 'submit',
            'type'       => 'Zend\Form\Element\Submit',
            'attributes' => array(
                'type' => 'submit'
            )
        ));
    }

    /**
     * get translatorHelper
     *
     * @return Zend\Mvc\I18n\Translator
     */
    private function getTranslatorHelper()
    {
        if (null === $this->translatorHelper) {
            $this->translatorHelper = $this->serviceLocator->get('MvcTranslator');
        }

        return $this->translatorHelper;
    }

    /**
     * get options
     *
     * @return ModuleOptions
     */
    private function getOptions()
    {
        if (null === $this->options) {
            $this->options = $this->serviceLocator->get('auth_module_options');
        }

        return $this->options;
    }

    /**
     * Fields for User Sign Up
     */
    private function addSignUpFields()
    {
        $this->addCreateUserFields();

        $this->form->add(array(
            'name'       => 'login',
            'type'       => 'Zend\Form\Element\Button',
            'attributes' => array(
                'class'   => 'btn btn btn-warning btn-lg',
                'onclick' => 'window.location="'.$this->getUrlPlugin()->fromRoute('user-index', array(
                        'action' => 'login'
                    )).'"'
            ),
            'options'    => array(
                'label' => $this->getTranslatorHelper()->translate('auth.button.signin')
            )
        ));
    }

    /**
     * Input fields for User Create
     */
    private function addCreateUserFields()
    {
        $this->form->add(array(
            'name'       => 'name',
            'type'       => 'Zend\Form\Element\Text',
            'attributes' => array(
                'type' => 'text'
            )
        ));

        $this->form->add(array(
            'name'       => 'passwordVerify',
            'type'       => 'Zend\Form\Element\Password',
            'attributes' => array(
                'required' => true,
                'type'     => 'password'
            )
        ));

        $this->form->add(array(
            'name'       => 'passwordVerify',
            'type'       => 'Zend\Form\Element\Password',
            'attributes' => array(
                'required' => true,
                'type'     => 'password'
            )
        ));
    }

    /**
     * get urlPlugin
     *
     * @return Zend\Mvc\Controller\Plugin\Url
     */
    private function getUrlPlugin()
    {
        if (null === $this->url) {
            $this->url = $this->serviceLocator->get('ControllerPluginManager')->get('url');
        }

        return $this->url;
    }

    /**
     * Input filters for User SignUp
     */
    private function addSignUpFilters()
    {
        $entityManager = $this->getEntityManager();
        $this->form->getInputFilter()->get('username')->getValidatorChain()->attach(new NoObjectExistsValidator(array(
            'object_repository' => $entityManager->getRepository('Auth\Entity\User'),
            'fields'            => array(
                'username'
            ),
            'messages'          => array(
                'objectFound' => $this->getTranslatorHelper()->translate('auth.error.username.taken')
            )
        )));

        $this->form->getInputFilter()->get('email')->getValidatorChain()->attach(new NoObjectExistsValidator(array(
            'object_repository' => $entityManager->getRepository('Auth\Entity\User'),
            'fields'            => array(
                'email'
            ),
            'messages'          => array(
                'objectFound' => $this->getTranslatorHelper()->translate('auth.error.email.taken')
            )
        )));
    }

    /**
     * Fields for User Change Password
     */
    private function addChangePasswordFields()
    {
        $this->form->add(array(
            'name'       => 'newPasswordVerify',
            'type'       => 'Zend\Form\Element\Password',
            'attributes' => array(
                'required' => true,
                'type'     => 'password'
            )
        ));
    }

    /**
     * Input filters for User Change password
     */
    private function addChangePasswordFilters()
    {
        $this->form->getInputFilter()->add($this->form->getInputFilter()->getFactory()->createInput(array(
            'name'       => 'newPasswordVerify',
            'filters'    => array(
                array(
                    'name' => 'StripTags'
                ),
                array(
                    'name' => 'StringTrim'
                )
            ),
            'validators' => array(
                array(
                    'name'    => 'StringLength',
                    'options' => array(
                        'encoding' => 'UTF-8',
                        'min'      => 3,
                        'max'      => 20
                    )
                ),
                array(
                    'name'    => 'Identical',
                    'options' => array(
                        'token' => 'password'
                    )
                )
            )
        )));
    }

    /**
     * Fields for User Password Reset
     */
    private function addResetPasswordFields()
    {
        $this->form->add(array(
            'name'       => 'usernameOrEmail',
            'type'       => 'Zend\Form\Element\Text',
            'attributes' => array(
                'type'     => 'text',
                'required' => 'true'
            )
        ));
    }

    /**
     * Input filters for User Reset Password
     */
    private function addResetPasswordFilters()
    {
        $this->form->getInputFilter()->add($this->form->getInputFilter()->getFactory()->createInput(array(
            'name'     => 'usernameOrEmail',
            'required' => true,
            'filters'  => array(
                array(
                    'name' => 'StripTags'
                ),
                array(
                    'name' => 'StringTrim'
                )
            )
        )));
    }

    /**
     * Fields for User Change Email
     */
    private function addChangeEmailFields()
    {
        $this->form->add(array(
            'name'       => 'newEmail',
            'type'       => 'Zend\Form\Element\Email',
            'attributes' => array(
                'type'     => 'email',
                'required' => 'true'
            )
        ));

        $this->form->add(array(
            'name'       => 'newEmailVerify',
            'type'       => 'Zend\Form\Element\Email',
            'attributes' => array(
                'type'     => 'email',
                'required' => 'true'
            )
        ));
    }

    /**
     * Input filters for User Change email
     */
    private function addChangeEmailFilters()
    {
        $this->form->getInputFilter()->add($this->form->getInputFilter()->getFactory()->createInput(array(
            'name'       => 'newEmail',
            'required'   => true,
            'filters'    => array(
                array(
                    'name' => 'StripTags'
                ),
                array(
                    'name' => 'StringTrim'
                )
            ),
            'validators' => array(
                array(
                    'name' => 'EmailAddress'
                ),
                array(
                    'name'    => 'DoctrineModule\Validator\NoObjectExists',
                    'options' => array(
                        'object_repository' => $this->getEntityManager()->getRepository('Auth\Entity\User'),
                        'fields'            => array(
                            'email'
                        ),
                        'messages'          => array(
                            'objectFound' => $this->getTranslatorHelper()->translate('auth.error.email.taken')
                        )
                    )
                )
            )
        )));

        $this->form->getInputFilter()->add($this->form->getInputFilter()->getFactory()->createInput(array(
            'name'       => 'newEmailVerify',
            'required'   => true,
            'filters'    => array(
                array(
                    'name' => 'StripTags'
                ),
                array(
                    'name' => 'StringTrim'
                )
            ),
            'validators' => array(
                array(
                    'name' => 'EmailAddress'
                ),
                array(
                    'name'    => 'Identical',
                    'options' => array(
                        'token' => 'newEmail'
                    )
                )
            )
        )));
    }

    /**
     * Input filters for User Create
     */
    private function addCreateUserFilters()
    {
        $this->form->getInputFilter()->add($this->form->getInputFilter()->getFactory()->createInput(array(
            'name'       => 'passwordVerify',
            'filters'    => array(
                array(
                    'name' => 'StripTags'
                ),
                array(
                    'name' => 'StringTrim'
                )
            ),
            'validators' => array(
                array(
                    'name'    => 'StringLength',
                    'options' => array(
                        'encoding' => 'UTF-8',
                        'min'      => 3,
                        'max'      => 20
                    )
                ),
                array(
                    'name'    => 'Identical',
                    'options' => array(
                        'token' => 'password'
                    )
                )
            )
        )));
    }

    /**
     * Fields for User Log In
     */
    private function addLoginFields()
    {
        $this->form->add(array(
            'name'       => 'usernameOrEmail',
            'type'       => 'Zend\Form\Element\Text',
            'attributes' => array(
                'type' => 'text'
            )
        ));

        $this->form->add(array(
            'name'    => 'rememberme',
            'type'    => 'Zend\Form\Element\Checkbox',
            'options' => array(
                'label' => $this->getTranslatorHelper()->translate('auth.label.rememberme')
            )
        ));
    }

    /**
     * Input filters for User Log In
     */
    private function addLoginFilters()
    {
        $this->form->getInputFilter()->add($this->form->getInputFilter()->getFactory()->createInput(array(
            'name'     => 'usernameOrEmail',
            'required' => true,
            'filters'  => array(
                array(
                    'name' => 'StripTags'
                ),
                array(
                    'name' => 'StringTrim'
                )
            )
        )));

        $this->form->getInputFilter()->add($this->form->getInputFilter()->getFactory()->createInput(array(
            'name'       => 'rememberme',
            'required'   => true,
            'filters'    => array(
                array(
                    'name' => 'StripTags'
                ),
                array(
                    'name' => 'StringTrim'
                )
            ),
            'validators' => array(
                array(
                    'name'    => 'InArray',
                    'options' => array(
                        'haystack' => array(
                            '0',
                            '1'
                        )
                    )
                )
            )
        )));
    }
}
