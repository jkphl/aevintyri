<?php

namespace Events\Form\Event;

use Doctrine\Common\Persistence\ObjectManager;
use Events\Entity\Event;

class Fieldset extends \Events\Form\Fieldset
{
    use \Events\Traits\ContactFieldset;
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
        parent::__construct($objectManager, $serviceLocator, new Event(), 'event');

        $this->add(array(
            'type'    => 'Zend\Form\Element\Text',
            'name'    => 'name',
            'options' => array(
                'label' => _('entity.common.name')
            )
        ));

        // Add all contact fields
        $this->_addContactFields();

        // Add description fields
        $this->_addTextsFields();

        // Add image field
        $this->_addImageField();

        // Add organizer field
        $this->add(array(
            'type'       => 'DoctrineModule\Form\Element\ObjectSelect',
            'name'       => 'organizer',
            'options'    => array(
                'object_manager'  => $objectManager,
                'target_class'    => '\Events\Entity\Organizer',
                'property'        => 'name',
                'is_method'       => true,
                'label'           => _('entity.event.organizer'),
                'empty_option'    => _('form.dropdown.select'),
                'label_generator' => function ($entity) {
                    return $entity->getName();
                },
                'find_method'     => array(
                    'name'   => 'findBy',
                    'params' => array(
                        'params'  => array(
                            'sys_deleted' => 0
                        ),
                        'orderBy' => array(
                            'name' => 'ASC'
                        )
                    )
                )
            ),
            'attributes' => array(
                'multiple' => false,
            )
        ));

        // Add series field
        $this->add(array(
            'type'       => 'DoctrineModule\Form\Element\ObjectSelect',
            'name'       => 'series',
            'options'    => array(
                'object_manager'  => $objectManager,
                'target_class'    => '\Events\Entity\Series',
                'property'        => 'name',
                'is_method'       => true,
                'label'           => _('entity.event.series'),
                'empty_option'    => _('form.dropdown.select'),
                'label_generator' => function ($entity) {
                    return $entity->getName();
                },
                'find_method'     => array(
                    'name'   => 'findBy',
                    'params' => array(
                        'params'  => array(
                            'sys_deleted' => 0
                        ),
                        'orderBy' => array(
                            'name' => 'ASC'
                        )
                    )
                )
            ),
            'attributes' => array(
                'multiple' => false,
            )
        ));

        $this->add(array(
            'type'       => 'Zend\Form\Element\Text',
            'name'       => 'facebook_event',
            'options'    => array(
                'label' => _('entity.event.facebook'),
            ),
            'attributes' => array(
                'id' => 'facebook_event',
            )
        ));

        $this->add(array(
            'type'       => 'Zend\Form\Element\Text',
            'name'       => 'gplus_event',
            'options'    => array(
                'label' => _('entity.event.gplus'),
            ),
            'attributes' => array(
                'id' => 'gplus_event',
            )
        ));

        $this->add(array(
            'type'       => 'Zend\Form\Element\Text',
            'name'       => 'xing_event',
            'options'    => array(
                'label' => _('entity.event.xing'),
            ),
            'attributes' => array(
                'id' => 'xing_event',
            )
        ));

        $this->add(array(
            'type'       => 'Zend\Form\Element\Text',
            'name'       => 'tickets',
            'options'    => array(
                'label' => _('entity.event.tickets'),
            ),
            'attributes' => array(
                'id' => 'tickets',
            )
        ));

        $this->add(array(
            'type'       => 'Zend\Form\Element\Number',
            'name'       => 'tickets_available',
            'options'    => array(
                'label' => _('entity.event.tickets.available'),
            ),
            'attributes' => array(
                'id'  => 'tickets_available',
                'min' => 0,
            ),
            'filters'    => array(
                array('name' => 'Int'),
            )
        ));

        $this->add(array(
            'type'       => 'Zend\Form\Element\Text',
            'name'       => 'tickets_email',
            'options'    => array(
                'label' => _('entity.event.tickets.email'),
            ),
            'attributes' => array(
                'id' => 'tickets_email',
            ),
            'filters'    => array(
                array('name' => 'StringTrim')
            ),
            'validators' => array(
                array('name' => 'EmailAddress')
            ),
        ));

        $this->add(array(
            'type'       => 'Zend\Form\Element\Text',
            'name'       => 'lanyrd',
            'options'    => array(
                'label' => _('entity.event.lanyrd'),
            ),
            'attributes' => array(
                'id' => 'lanyrd',
            )
        ));
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
            $this->_getTextsInputFilterSpecification(),
            $this->_getContactInputFilterSpecification(),
            parent::getInputFilterSpecification(),
            array(
                'name'              => array(
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
                'organizer'         => array(
                    'required' => true
                ),
                'series'            => array(
                    'required' => false
                ),
                'facebook_event'    => array(
                    'required'   => false,
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
                                'allowRelative' => true,
                                'allowAbsolute' => false,
                                'messages'      => array()
                            )
                        )
                    )
                ),
                'xing_event'        => array(
                    'required'   => false,
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
                                'allowRelative' => true,
                                'allowAbsolute' => false,
                                'messages'      => array()
                            )
                        )
                    )
                ),
                'gplus_event'       => array(
                    'required'   => false,
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
                                'allowRelative' => true,
                                'allowAbsolute' => false,
                                'messages'      => array()
                            )
                        )
                    )
                ),
                'lanyrd'            => array(
                    'required'   => false,
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
                        )
                    )
                ),
                'tickets'           => array(
                    'required'   => false,
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
                        )
                    )
                ),
                'tickets_available' => array(
                    'required'   => false,
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
                            'name' => 'Int',
                        )
                    )
                ),
                'tickets_email'     => array(
                    'required'   => false,
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
                            'name'    => 'EmailAddress',
                            'options' => array(
                                'messages' => array()
                            )
                        )
                    )
                ),
            )
        );

// 		$inputFilterSpecification['abstract']['required'] = true;
        return $inputFilterSpecification;
    }
}