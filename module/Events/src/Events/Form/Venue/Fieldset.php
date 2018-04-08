<?php

namespace Events\Form\Venue;

use Doctrine\Common\Persistence\ObjectManager;
use Events\Entity\Venue;

class Fieldset extends \Events\Form\Fieldset
{
    use \Events\Traits\AddressFieldset;
    use \Events\Traits\TextsFieldset;
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
        parent::__construct($objectManager, $serviceLocator, new Venue(), 'venue');

        $this->add(array(
            'type'    => 'Zend\Form\Element\Text',
            'name'    => 'name',
            'options' => array(
                'label' => _('entity.common.name')
            )
        ));

        // Add all address fields
        $this->_addAddressFields();

        // Add description fields
        $this->_addTextsFields();

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
        $inputFilterSpecification = array_merge(
            $this->_getImageInputFilterSpecification(),
            $this->_getAddressInputFilterSpecification(),
            $this->_getTextsInputFilterSpecification(),
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

        return $inputFilterSpecification;
    }
}