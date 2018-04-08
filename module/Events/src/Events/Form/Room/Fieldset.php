<?php

namespace Events\Form\Room;

use Doctrine\Common\Persistence\ObjectManager;
use Events\Entity\Room;

class Fieldset extends \Events\Form\Fieldset
{
    use \Events\Traits\TextsFieldset;

    /**
     * Constructor
     *
     * @param ObjectManager $objectManager Object manager
     *
     * @return void
     */
    public function __construct(ObjectManager $objectManager, \Zend\ServiceManager\ServiceManager $serviceLocator)
    {
        parent::__construct($objectManager, $serviceLocator, new Room(), 'room');

        $this->add(array(
            'type'    => 'Zend\Form\Element\Text',
            'name'    => 'name',
            'options' => array(
                'label' => _('entity.common.name')
            )
        ));
        $this->add(array(
            'type'    => 'Zend\Form\Element\Text',
            'name'    => 'number',
            'options' => array(
                'label' => _('entity.room.number')
            )
        ));
        $this->add(array(
            'type'    => 'DoctrineModule\Form\Element\ObjectSelect',
            'name'    => 'venue',
            'options' => array(
                'object_manager' => $objectManager,
                'target_class'   => '\Events\Entity\Venue',
                'property'       => 'id',
            ),
        ));

        // Add description fields
        $this->_addTextsFields();
    }

    /**
     * Return the input filter specification
     *
     * @return \array            Input filter specification
     */
    public function getInputFilterSpecification()
    {
        $inputFilterSpecification = array_merge(
            $this->_getTextsInputFilterSpecification(),
            parent::getInputFilterSpecification(),
            array(
                'name'   => array(
                    'required' => false,
                    'filters'  => array(
                        array(
                            'name' => 'StripTags'
                        ),
                        array(
                            'name' => 'StringTrim'
                        )
                    ),
                ),
                'number' => array(
                    'required' => false,
                    'filters'  => array(
                        array(
                            'name' => 'StripTags'
                        ),
                        array(
                            'name' => 'StringTrim'
                        )
                    ),
                ),
                'venue'  => array(
                    'required' => false,
                ),
            )
        );

        return $inputFilterSpecification;
    }
}