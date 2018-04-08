<?php

namespace Events\Form\Venue;

use Doctrine\Common\Persistence\ObjectManager;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;
use Zend\Form\Form;

class AddForm extends Form
{
    public function __construct(ObjectManager $objectManager, \Zend\ServiceManager\ServiceManager $serviceLocator)
    {
        parent::__construct('venue-add-form');

        // The form will hydrate an object of type "Company"
        $this->setHydrator(new DoctrineHydrator($objectManager));

        // Add the user fieldset, and set it as the base fieldset
        $entityFieldset = new \Events\Form\Venue\Fieldset($objectManager, $serviceLocator);
        $entityFieldset->setUseAsBaseFieldset(true);
        $this->add($entityFieldset);

        // … add CSRF and submit elements …
        $this->add(array(
            'name'       => 'create',
            'type'       => 'Submit',
            'attributes' => array(
                'value' => _('button.create'),
                'id'    => 'create',
                'class' => 'button'
            )
        ));
        $this->add(array(
            'name'       => 'createclose',
            'type'       => 'Submit',
            'attributes' => array(
                'value' => _('button.createclose'),
                'id'    => 'creatclose',
                'class' => 'button'
            )
        ));
    }
}