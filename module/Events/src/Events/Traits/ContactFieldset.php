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

namespace Events\Traits;

/**
 * Contact fieldset trait
 *
 * @author		Joschi Kuphal <joschi@kuphal.net>
 */
trait ContactFieldset {
	
	/**
	 * Add all fields necessary for contact details
	 * 
	 * @return void
	 */
	public function _addContactFields() {
		$this->add(array(
			'type' => 'Zend\Form\Element\Text',
			'name' => 'email',
			'options' => array(
				'label' => _('entity.contact.email')
			),
			'filters' => array(
				array('name' => 'StringTrim')
			),
			'validators' => array(
				array('name' => 'EmailAddress')
			),
		));
		$this->add(array(
			'type' => 'Zend\Form\Element\Text',
			'name' => 'phone',
			'options' => array(
				'label' => _('entity.contact.phone')
			)
		));
		$this->add(array(
			'type' => 'Zend\Form\Element\Text',
			'name' => 'fax',
			'options' => array(
				'label' => _('entity.contact.fax')
			)
		));
		$this->add(array(
			'type' => 'Zend\Form\Element\Text',
			'name' => 'cell',
			'options' => array(
				'label' => _('entity.contact.cell')
			)
		));
		$this->add(array(
			'type' => 'Zend\Form\Element\Text',
			'name' => 'facebook',
			'options' => array(
				'label' => _('entity.contact.facebook')
			),
			'attributes' => array(
				'id' => 'facebook',
			)
		));
		$this->add(array(
			'type' => 'Zend\Form\Element\Text',
			'name' => 'twitter',
			'options' => array(
				'label' => _('entity.contact.twitter'),
			),
			'attributes' => array(
				'id' => 'twitter',
			)
		));
		$this->add(array(
			'type' => 'Zend\Form\Element\Text',
			'name' => 'xing',
			'options' => array(
				'label' => _('entity.contact.xing')
			),
			'attributes' => array(
				'id' => 'xing',
			)
		));
		$this->add(array(
			'type' => 'Zend\Form\Element\Text',
			'name' => 'gplus',
			'options' => array(
				'label' => _('entity.contact.gplus')
			),
			'attributes' => array(
				'id' => 'gplus',
			)
		));
		$this->add(array(
			'type' => 'Zend\Form\Element\Text',
			'name' => 'web',
			'options' => array(
				'label' => _('entity.contact.web')
			)
		));
	}
	
	/**
	 * Return the contact specific input filter specification
	 *
	 * @return \array			Input filter specification
	 */
	protected function _getContactInputFilterSpecification() {
		return array(
			'phone' => array(
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
			'cell' => array(
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
			'fax' => array(
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
			'email' => array(
				'required' => false,
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
						'name' => 'EmailAddress',
						'options' => array(
							'messages' => array()
						)
					)
				)
			),
			'web' => array(
				'required' => false,
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
						'name' => 'Uri',
						'options' => array(
							'allowRelative' => false,
							'messages' => array()
						)
					)
				)
			),
			'facebook' => array(
				'required' => false,
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
						'name' => 'Uri',
						'options' => array(
							'allowRelative' => true,
							'allowAbsolute' => false,
							'messages' => array()
						)
					)
				)
			),
			'xing' => array(
				'required' => false,
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
						'name' => 'Uri',
						'options' => array(
							'allowRelative' => true,
							'allowAbsolute' => false,
							'messages' => array()
						)
					)
				)
			),
			'gplus' => array(
				'required' => false,
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
						'name' => 'Uri',
						'options' => array(
							'allowRelative' => true,
							'allowAbsolute' => false,
							'messages' => array()
						)
					)
				)
			),
		);
	}
}