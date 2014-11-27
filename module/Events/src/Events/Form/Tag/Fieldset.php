<?php

namespace Events\Form\Tag;

use Events\Entity\Tag;
use Doctrine\Common\Persistence\ObjectManager;

class Fieldset extends \Events\Form\Fieldset {
	
	/**
	 * Constructor
	 * 
	 * @param ObjectManager $objectManager		Object manager
	 * @return void
	 */
	public function __construct(ObjectManager $objectManager, \Zend\ServiceManager\ServiceManager $serviceLocator) {
		parent::__construct($objectManager, $serviceLocator, new Tag(), 'tag');
		
		$this->add(array(
			'type' => 'Zend\Form\Element\Text',
			'name' => 'name',
			'options' => array(
				'label' => _('entity.common.name')
			)
		));
		$this->add(array(
			'type' => 'Zend\Form\Element\Color',
			'name' => 'color',
			'options' => array(
				'label' => _('entity.tag.color')
			)
		));
	}
	
	/**
	 * Return the input filter specification
	 *
	 * @return \array			Input filter specification
	 */
	public function getInputFilterSpecification() {
		return array_merge(
			parent::getInputFilterSpecification(),
			array(
			'name' => array(
				'required' => true,
				'filters' => array(
					array(
						'name' => 'StripTags'
					),
					array(
						'name' => 'StringTrim'
					)
				),
				'validators' => array(
					array(
						'name' => 'NotEmpty',
						'options' => array(
							'messages' => array()
							// \Zend\Validator\NotEmpty::IS_EMPTY => 'Bitte tragen Sie einen Vornamen ein'
						)
					)
				)
			),
			'color' => array(
				'required' => false,
				'filters' => array(
					array(
						'name' => 'StringTrim'
					),
					array(
						'name' => 'StringToLower'
					),
				),
				'validators' => array(
					array(
						'name' => 'Regex',
						'options' => array(
							'pattern' => '%^#[0-9a-fA-F]{6}$%'
						)
					)
				),
			),
		));
	}
}