<?php

namespace Events\Form;

use Doctrine\Common\Persistence\ObjectManager;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;
use Zend\InputFilter\InputFilterProviderInterface;

class Fieldset extends \Zend\Form\Fieldset implements InputFilterProviderInterface {
	/**
	 * Entity manager
	 * 
	 * @var \Doctrine\Common\Persistence\ObjectManager
	 */
	protected $entityManager;
	/**
	 * Service locator
	 * 
	 * @var \Zend\ServiceManager\ServiceManager
	 */
	protected $serviceLocator;

	/**
	 * Constructor
	 *  
	 * @param ObjectManager $objectManager
	 * @param \Zend\ServiceManager\ServiceManager $serviceLocator
	 * @param \Events\Entity\AbstractEntity $entity
	 * @param \string $type
	 */
	public function __construct(ObjectManager $objectManager, \Zend\ServiceManager\ServiceManager $serviceLocator, \Events\Entity\AbstractEntity $entity, $type) {
		parent::__construct($type);
		$this->entityManager = $objectManager;
		$this->serviceLocator = $serviceLocator;
		$this->setHydrator (new DoctrineHydrator($objectManager))->setObject($entity);
		
		$this->add ( array (
				'type' => 'Zend\Form\Element\Hidden',
				'name' => 'id' 
		) );
	}
	
	/**
	 * Return the input filter specification
	 * 
	 * @return \array			Input filter specification
	 */
	public function getInputFilterSpecification() {
		return array (
			'id' => array (
				'required' => false 
			) 
		);
	}
}