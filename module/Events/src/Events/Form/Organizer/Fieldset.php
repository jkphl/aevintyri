<?php

namespace Events\Form\Organizer;

use Doctrine\Common\Persistence\ObjectManager;
use Events\Entity\Organizer;

class Fieldset extends \Events\Form\Fieldset
{
    use \Events\Traits\AddressFieldset;
    use \Events\Traits\ContactFieldset;
    use \Events\Traits\ImageField;

    /**
     * Constructor
     *
     * @param ObjectManager $objectManager Object manager
     *
     * @return void
     */
    public function __construct(ObjectManager $objectManager, \Zend\ServiceManager\ServiceManager $serviceLocator)
    {
        parent::__construct($objectManager, $serviceLocator, new Organizer(), 'organizer');

// 		$this->add(array(
// 			'type' => 'Zend\Form\Element\Hidden',
// 			'name' => 'id'
// 		));

        $this->add(array(
            'type'    => 'Zend\Form\Element\Text',
            'name'    => 'name',
            'options' => array(
                'label' => _('entity.common.name')
            )
        ));
        $this->add(array(
            'type'    => 'Zend\Form\Element\Text',
            'name'    => 'company',
            'options' => array(
                'label' => _('entity.organizer.company')
            )
        ));

        // Add all address fields
        $this->_addAddressFields();

        // Add all contact fields
        $this->_addContactFields();

        // Add image field
        $this->_addImageField();
    }

    /**
     * Return the input filter specification
     *
     * @return \array            Input filter specification
     */
    public function getInputFilterSpecification()
    {
        return array_merge(
            $this->_getImageInputFilterSpecification(),
            $this->_getAddressInputFilterSpecification(),
            $this->_getContactInputFilterSpecification(),
            parent::getInputFilterSpecification(),
            array(
                'name' => array(
                    'required'   => true,
                    'filters'    => array(
                        array(
                            'name' => 'StripTags'
                        ),
                        array(
                            'name' => 'StringTrim'
                        )
                    ),
                    'validators' => array(
                        array(
                            'name'    => 'NotEmpty',
                            'options' => array(
                                'messages' => array()
                                // \Zend\Validator\NotEmpty::IS_EMPTY => 'Bitte tragen Sie einen Vornamen ein'

                            )
                        )
                    )
                ),
            ));
    }
}