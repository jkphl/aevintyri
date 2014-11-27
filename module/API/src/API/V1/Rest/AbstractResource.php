<?php

/**
 * Event management
 *
 * @category	Tollwerk
 * @package		Tollwerk_Events
 * @author		Joschi Kuphal <joschi@kuphal.net>
 * @copyright	Copyright © 2014 tollwerk GmbH <info@tollwerk.de>
 * @license		http://opensource.org/licenses/BSD-3-Clause	The BSD 3-Clause License
 */

namespace API\V1\Rest;

use API\V1\Mapper\AbstractMapper;
use ZF\Rest\AbstractResourceListener;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class AbstractResource extends AbstractResourceListener implements ServiceLocatorAwareInterface {
	/**
	 *
	 * @var ServiceLocatorInterface
	 */
	protected $serviceLocator;
	/**
	 * Event entity mapper
	 * 
	 * @var \API\V1\Mapper\AbstractMapper
	 */
	protected $mapper;
	
	/**
	 * Constructor
	 */
	public function __construct(AbstractMapper $mapper) {
		$this->mapper = $mapper;
	}

	/**
	 * Set serviceManager instance
	 *
	 * @param ServiceLocatorInterface $serviceLocator
	 * @return void
	 */
	public function setServiceLocator(ServiceLocatorInterface $serviceLocator) {
		$this->serviceLocator = $serviceLocator;
	}

	/**
	 * Retrieve serviceManager instance
	 *
	 * @return ServiceLocatorInterface
	 */
	public function getServiceLocator() {
		return $this->serviceLocator;
	}
}
