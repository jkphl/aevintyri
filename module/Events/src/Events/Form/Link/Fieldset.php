<?php

namespace Events\Form\Link;

use Doctrine\Common\Persistence\ObjectManager;
use Events\Entity\Link;

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
        parent::__construct($objectManager, $serviceLocator, new Link(), 'link');

        // Add the name field
        $this->add(array(
            'type'    => 'Zend\Form\Element\Text',
            'name'    => 'name',
            'options' => array(
                'label' => _('entity.common.name')
            )
        ));

        // Add the URL field
        $this->add(array(
            'type'    => 'Zend\Form\Element\Text',
            'name'    => 'url',
            'options' => array(
                'label' => _('entity.link.url')
            )
        ));

        // Add the presenter field
        $this->add(array(
            'type'    => 'DoctrineModule\Form\Element\ObjectSelect',
            'name'    => 'presenter',
            'options' => array(
                'object_manager' => $objectManager,
                'target_class'   => '\Events\Entity\Presenter',
                'property'       => 'id',
            ),
        ));

        // Add the session field
        $this->add(array(
            'type'    => 'DoctrineModule\Form\Element\ObjectSelect',
            'name'    => 'session',
            'options' => array(
                'object_manager' => $objectManager,
                'target_class'   => '\Events\Entity\Session',
                'property'       => 'id',
            ),
        ));
    }

    /**
     * Return the input filter specification
     * @return \array            Input filter specification
     */
    public function getInputFilterSpecification()
    {
        return array_merge(
            parent::getInputFilterSpecification(),
            array(
                'name'      => array(
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
                'url'       => array(
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
                            'name'    => 'Uri',
                            'options' => array(
                                'allowRelative' => false,
                                'messages'      => array()
                            )
                        ),
                        array(
                            'name'    => 'Events\Validator\UniqueObject',
                            'options' => array(
                                'object_repository' => $this->entityManager->getRepository('Events\Entity\Link'),
                                'fields'            => array('presenter', 'session', 'url'),
                                'object_manager'    => $this->entityManager,
                                'messages'          => array(
                                    \DoctrineModule\Validator\UniqueObject::ERROR_OBJECT_NOT_UNIQUE => $this->serviceLocator->get('translator')
                                                                                                                            ->translate('entity.link.unique')
                                ),
                            ),
                        )
                    )
                ),
                'presenter' => array(
                    'required' => false,
                ),
                'session'   => array(
                    'required' => false,
                ),
            ));
    }
}