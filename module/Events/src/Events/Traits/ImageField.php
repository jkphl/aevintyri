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
 * Image field trait
 *
 * @author		Joschi Kuphal <joschi@kuphal.net>
 */
trait ImageField {
	
	/**
	 * Add all fields necessary for contact details
	 * 
	 * @return void
	 */
	public function _addImageField() {
		$this->add(array(
			'type' => 'Zend\Form\Element\File',
			'name' => 'upload_image',
			'options' => array(
				'label' => _('entity.common.image')
			)
		));
		$this->add(array(
			'type' => 'Zend\Form\Element\Checkbox',
			'name' => 'delete_image',
			'options' => array(
				'label' => _('entity.common.image.delete')
			)
		));
		$this->add(array(
			'type' => 'Hidden',
			'name' => 'image',
		));
	}
	
	/**
	 * Return the image specific input filter specification
	 *
	 * @return \array			Input filter specification
	 */
	protected function _getImageInputFilterSpecification() {
		return array(
			'upload_image' => array(
				'required' => false,
				'type' => 'Zend\InputFilter\FileInput',
                'filters' => array(
//                 	array(
// 						'name'						=> 'Zend\Validator\File\Extension',                	
//                 		'options'					=> array(
//                 			'extensions'			=> array('jpg', 'jpeg', 'png', 'gif'),
//                 			'case'					=> false,
// 		                )
//                 	),
                    array(
                    	'name'						=> 'FileRenameUpload',
                        'options'					=> array(
                            'target'				=> './public/img/_temp',
							'use_upload_extension'  => true,
                            'randomize'				=> true
                        )
                    ),
                ),
			),
			'delete_image' => array(
				'required' => false,
			)
		);
	}
}