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

namespace Auth;

return array(
    'controllers' => array(
        'invokables' => array(
            'Auth\Controller\Index'        => 'Auth\Controller\IndexController',
            'Auth\Controller\Registration' => 'Auth\Controller\RegistrationController',
            'Auth\Controller\Admin'        => 'Auth\Controller\AdminController'
        )
    ),

    'router' => array(
        'routes' => array(
            'user-index'    => array(
                'type'          => 'Segment',
                'options'       => array(
                    'route'       => '/user[/:action]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*'
                    ),
                    'defaults'    => array(
                        'controller' => 'Auth\Controller\Index',
                        'action'     => 'index'
                    )
                ),
                'may_terminate' => true
            ),
            'user-register' => array(
                'type'          => 'Segment',
                'options'       => array(
                    'route'       => '/user/register[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[a-zA-Z0-9]*'
                    ),
                    'defaults'    => array(
                        'controller' => 'Auth\Controller\Registration',
                        'action'     => 'index'
                    )
                ),
                'may_terminate' => true
            ),
            'user-admin'    => array(
                'type'          => 'Segment',
                'options'       => array(
                    'route'       => '/user/admin[/:action][/:id][/:state]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                        'state'  => '[0-9]'
                    ),
                    'defaults'    => array(
                        'controller' => 'Auth\Controller\Admin',
                        'action'     => 'index'
                    )
                ),
                'may_terminate' => true
            )
        )
    ),

    'view_manager' => array(
        'display_exceptions'  => true,
        'template_map'        => array(),
        'template_path_stack' => array(
            'auth' => __DIR__.'/../view'
        )
    ),

    'service_manager' => array(
        'factories' => array(
            'Zend\Authentication\AuthenticationService' => 'Auth\Service\Factory\AuthenticationFactory',
            'mail.transport'                            => 'Auth\Service\Factory\MailTransportFactory',
            'auth_module_options'                       => 'Auth\Service\Factory\ModuleOptionsFactory',
            'auth_error_view'                           => 'Auth\Service\Factory\ErrorViewFactory',
            'auth_user_form'                            => 'Auth\Service\Factory\UserFormFactory'
        )
    ),

    'doctrine' => array(
        'authentication' => array(
            'orm_default' => array(
                // 'objectManager' => 'Doctrine\ORM\EntityManager',
                'identityClass'       => 'Auth\Entity\User',
                'identityProperty'    => 'username',
                'credentialProperty'  => 'password',
                'credential_callable' => 'Auth\Service\UserService::verifyHashedPassword'
            )
        ),
        'driver'         => array(
            __NAMESPACE__.'_driver' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(
                    __DIR__.'/../src/'.__NAMESPACE__.'/Entity'
                )
// 'identityClass' => 'Auth\Entity\User',
// 'identityProperty' => 'username',
// 'credentialProperty' => 'password',
// 'credential_callable' => function (\Auth\Entity\User $user, $passwordGiven) {
// return (md5($passwordGiven) == $user->getPassword()) && $user->isActive();
// }
            ),
            'orm_default'           => array(
                'drivers' => array(
                    __NAMESPACE__.'\Entity' => __NAMESPACE__.'_driver'
                )
            )
        )
    ),

    'translator' => array(
        'locale'                    => 'en_US',
        'translation_file_patterns' => array(
            array(
                'type'     => 'gettext',
                'base_dir' => __DIR__.'/../language',
                'pattern'  => '%s.mo'
            )
        )
    )
);