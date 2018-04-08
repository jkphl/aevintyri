<?php

namespace Events\Form\Day;

use Doctrine\Common\Persistence\ObjectManager;
use Events\Entity\Day;

class Fieldset extends \Events\Form\Fieldset
{

    /**
     * Constructor
     *
     * @param ObjectManager $objectManager Object manager
     *
     * @return void
     */
    public function __construct(ObjectManager $objectManager, \Zend\ServiceManager\ServiceManager $serviceLocator)
    {
        parent::__construct($objectManager, $serviceLocator, new Day(), 'day');

        $this->add(array(
            'type'    => 'Zend\Form\Element\Date',
            'name'    => 'date',
            'options' => array(
                'label' => _('entity.day.date')
            )
        ));

        $this->add(array(
            'type'    => 'DoctrineModule\Form\Element\ObjectSelect',
            'name'    => 'event',
            'options' => array(
                'object_manager' => $objectManager,
                'target_class'   => '\Events\Entity\Event',
                'property'       => 'id',
            ),
        ));
    }

    /**
     * Return the input filter specification
     *
     * @return \array            Input filter specification
     */
    public function getInputFilterSpecification()
    {
        return array_merge(
            parent::getInputFilterSpecification(),
            array(
                'date' => array(
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
                            'name' => 'NotEmpty',
                        ),
                        array(
                            'name'    => 'DateStep',
                            'options' => array(
                                'baseValue' => '1970-01-01'
                            )
                        ),
                        array(
                            'name'    => 'Events\Validator\UniqueObject',
                            'options' => array(
                                'object_repository' => $this->entityManager->getRepository('Events\Entity\Day'),
                                'fields'            => array('event', 'date'),
                                'object_manager'    => $this->entityManager,
                                'messages'          => array(
                                    \DoctrineModule\Validator\UniqueObject::ERROR_OBJECT_NOT_UNIQUE => $this->serviceLocator->get('translator')
                                                                                                                            ->translate('entity.day.event.unique')
                                ),
                            ),
                        )
                    )
                ),
            )
        );
    }
}