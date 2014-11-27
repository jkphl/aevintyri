<?php

namespace Events\Form\Session;

use Events\Entity\Session;
use Doctrine\Common\Persistence\ObjectManager;

class Fieldset extends \Events\Form\Fieldset {
	use \Events\Traits\TextsFieldset;
	use \Events\Traits\ImageField;
	
	/**
	 * Constructor
	 * 
	 * @param ObjectManager $objectManager		Object manager
	 * @return void
	 */
	public function __construct(ObjectManager $objectManager, \Zend\ServiceManager\ServiceManager $serviceLocator) {
		parent::__construct($objectManager, $serviceLocator, new Session(), 'session');
		
		$this->add(array(
			'type' => 'Zend\Form\Element\Text',
			'name' => 'name',
			'options' => array(
				'label' => _('entity.common.name')
			)
		));
		
		$this->add(array(
			'type'							=> 'DoctrineModule\Form\Element\ObjectSelect',
			'name'							=> 'day',
			'options'						=> array(
				'object_manager'			=> $objectManager,
				'target_class'				=> '\Events\Entity\Day',
				'property'					=> 'id',
				'label'						=> _('entity.session.day'),
			),
		));
		
		// Add room field
		$this->add(array(
			'type'							=> 'DoctrineModule\Form\Element\ObjectSelect',
			'name'							=> 'room',
			'options'						=> array(
				'object_manager'			=> $objectManager,
				'target_class'				=> '\Events\Entity\Room',
				'property'					=> 'name',
				'is_method'					=> true,
				'label'						=> _('entity.session.room'),
				'empty_option'				=> _('form.dropdown.select'),
				'label_generator'			=> function ($entity) {
					$venue					= $entity->getVenue()->getName();
					$room					= $entity->getName();
// 					return strlen($room) ? sprintf(_('entity.session.room.venue'), $venue, $room) : $venue;
					return strlen($room) ? $venue.' ['.$room.']' : $venue;
				},
				'find_method'				=> array(
					'name'					=> 'findBy',
					'params'				=> array(
						'params'			=> array(
							'sys_deleted'	=> 0
						),
						'orderBy'			=> array(
							'name'			=> 'ASC'
						)
					)
				)
			),
			'attributes'					=> array(
				'multiple'					=> false,
			)
		));
		
		// Add presenter field
		$this->add(array(
			'type'							=> 'DoctrineModule\Form\Element\ObjectSelect',
			'name'							=> 'presenters',
			'options'						=> array(
				'object_manager'			=> $objectManager,
				'target_class'				=> '\Events\Entity\Presenter',
				'property'					=> 'name',
				'is_method'					=> true,
				'label'						=> _('entity.session.presenters'),
				'empty_option'				=> _('form.dropdown.unselect'),
				'label_generator'			=> function ($entity) {
					return $entity->getName();
				},
				'find_method'				=> array(
					'name'					=> 'findBy',
					'params'				=> array(
						'params'			=> array(
							'sys_deleted'	=> 0
						),
						'orderBy'			=> array(
							'name'			=> 'ASC'
						)
					)
				)
			),
			'attributes'					=> array(
				'multiple'					=> 'multiple',
				'size'						=> 5
			)
		));
		
		// Add tags field
		$this->add(array(
			'type'							=> 'DoctrineModule\Form\Element\ObjectSelect',
			'name'							=> 'tags',
			'options'						=> array(
				'object_manager'			=> $objectManager,
				'target_class'				=> '\Events\Entity\Tag',
				'property'					=> 'name',
				'is_method'					=> true,
				'label'						=> _('entity.presenter.tags'),
				'empty_option'				=> _('form.dropdown.unselect'),
				'label_generator'			=> function ($entity) {
					return $entity->getName();
				},
				'find_method'				=> array(
					'name'					=> 'findBy',
					'params'				=> array(
						'params'			=> array(
							'sys_deleted'	=> 0
						),
						'orderBy'			=> array(
							'name'			=> 'ASC'
						)
					)
				)
			),
			'attributes'					=> array(
				'multiple'					=> 'multiple',
				'size'						=> 5
			)
		));
		
		$this->add(array(
			'type' => 'Zend\Form\Element\Time',
			'name' => 'start_time',
			'options' => array(
				'label' => _('entity.session.time.start'),
				'format' => 'H:i'
			),
			'attributes' => array(
				'min' => '00:00',
				'max' => '23:59',
				'step' => '60',
			)
		));
		$this->add(array(
			'type' => 'Zend\Form\Element\Time',
			'name' => 'end_time',
			'options' => array(
				'label' => _('entity.session.time.end'),
				'format' => 'H:i'
			),
			'attributes' => array(
				'min' => '00:00',
				'max' => '23:59',
				'step' => '60',
			)
		));

		$this->add(array(
			'type'    => 'Zend\Form\Element\Select',
			'name'    => 'level',
			'options' => array(
				'label'			=> _('entity.session.level'),
			),
			'attributes'		=> array(
				'options'		=> array(
					1			=> _('entity.session.level.1'),
					2			=> _('entity.session.level.2'),
					3			=> _('entity.session.level.3'),
				)
			)
		));
		
		$this->add(array(
			'type' => 'Zend\Form\Element\Text',
			'name' => 'requirements',
			'options' => array(
				'label' => _('entity.session.requirements')
			)
		));

		// Add description fields
		$this->_addTextsFields();
				
		// Add image field
		$this->_addImageField();
	}
	
	/**
	 * Return the input filter specification
	 *
	 * @return \array			Input filter specification
	 */
	public function getInputFilterSpecification() {
		$inputFilterSpecification = array_merge(
			$this->_getImageInputFilterSpecification(),
			$this->_getTextsInputFilterSpecification(),
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
				'start_time' => array(
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
							)
						),
						array(
							'name' => 'DateStep',
							'options' => array(
								'format' => 'H:i',
								'min' => '00:00',
								'max' => '23:59',
								'step' => new \DateInterval('PT60S'),
								'baseValue' => '00:00'
							)
						),
					)
				),
				'end_time' => array(
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
							)
						),
						array(
							'name' => 'DateStep',
							'options' => array(
								'format' => 'H:i',
								'min' => '00:00',
								'max' => '23:59',
								'step' => new \DateInterval('PT60S'),
								'baseValue' => '00:00'
							)
						),
					)
				),
				'presenters' => array(
					'required' => false
				),
				'tags' => array(
					'required' => false
				),
				'level' => array(
					'required' => true,
				),
				'requirements' => array(
					'required' => false,
					'filters' => array(
						array(
							'name' => 'StripTags'
						),
						array(
							'name' => 'StringTrim'
						)
					),
				),
			)
		);
		
		return $inputFilterSpecification;
	}
}