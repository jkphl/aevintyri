<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Navigation;

use Navigation\Acl\Acl as NavigationAcl;
use Zend\View\HelperPluginManager;

class Module
{
    protected $_serviceManager;

    public function getConfig()
    {
        return include __DIR__.'/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__.'/src/'.__NAMESPACE__
                )
            )
        );
    }

    public function onBootstrap(\Zend\EventManager\EventInterface $e)
    {
        $application           = $e->getApplication();
        $this->_serviceManager = $application->getServiceManager();
    }

    public function getViewHelperConfig()
    {
        return array(
            'factories' => array(
                // Overwrite the default navigation helper
                'navigation' => function (HelperPluginManager $pm) {
                    $this->_serviceManager = $pm->getServiceLocator();
                    $config                = $this->_serviceManager->get('Config');
                    $acl                   = new NavigationAcl($config);

                    // Get the AuthenticationService
                    $auth = $this->_serviceManager->get('Zend\Authentication\AuthenticationService');
                    $role = NavigationAcl::DEFAULT_ROLE; // The default role is guest $acl

                    if ($auth->hasIdentity()) {
                        $user = $auth->getIdentity();
                        $role = 1;
                        // $role = $user->role;
                        switch ($role) {
                            case 0:
                                $role = NavigationAcl::DEFAULT_ROLE; // guest
                                break;
                            case 1:
                                $role = 'user';
                                break;
                            case 2:
                                $role = 'admin';
                                break;
                            default:
                                $role = NavigationAcl::DEFAULT_ROLE; // guest
                                break;
                        }
                    }

                    // Get an instance of the proxy helper
                    $navigation = $pm->get('Zend\View\Helper\Navigation');

                    // Store ACL and role in the proxy helper:
                    $navigation->setAcl($acl)->setRole($role);

                    // Return the new navigation helper instance
                    return $navigation;
                }
            )
        );
    }
}