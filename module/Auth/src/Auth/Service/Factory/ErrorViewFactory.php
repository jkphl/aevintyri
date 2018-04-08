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

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\View\Model\ViewModel;

class ErrorViewFactory implements FactoryInterface
{
    private $serviceLocator;

    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $this->serviceLocator = $serviceLocator;

        return $this;
    }

    /**
     * Create error view
     *
     * Method to create error view to display possible exceptions
     *
     * @return ViewModel
     */
    public function createErrorView($errorMessage, $exception, $displayExceptions = false, $displayNavMenu = false)
    {
        $viewModel = new ViewModel(array(
            'navMenu'            => $displayNavMenu,
            'display_exceptions' => $displayExceptions,
            'errorMessage'       => $errorMessage,
            'exception'          => $exception,
        ));
        $viewModel->setTemplate('auth/error/error');

        return $viewModel;
    }
}
