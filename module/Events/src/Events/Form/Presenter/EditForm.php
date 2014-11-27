<?php

namespace Events\Form\Presenter;

use Doctrine\Common\Persistence\ObjectManager;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;
use Zend\Form\Form;

class EditForm extends Form {
	public function __construct(ObjectManager $objectManager, \Zend\ServiceManager\ServiceManager $serviceLocator) {
		parent::__construct('presenter-edit-form');
		
		// The form will hydrate an object of type "Company"
		$this->setHydrator(new DoctrineHydrator($objectManager));
		
		// Add the user fieldset, and set it as the base fieldset
		$entityFieldset		= new \Events\Form\Presenter\Fieldset($objectManager, $serviceLocator);
		$entityFieldset->setUseAsBaseFieldset(true);
		$this->add($entityFieldset);
		
		// … add CSRF and submit elements …
		$this->add(array(
			'name'			=> 'save',
			'type'			=> 'Submit',
			'attributes'	=> array(
				'value'		=> _('button.save'),
				'id'		=> 'save',
				'class'		=> 'button'
			)
		));
		$this->add(array(
			'name'			=> 'saveclose',
			'type'			=> 'Submit',
			'attributes'	=> array(
				'value'		=> _('button.saveclose'),
				'id'		=> 'saveclose',
				'class'		=> 'button'
			)
		));
	}
}