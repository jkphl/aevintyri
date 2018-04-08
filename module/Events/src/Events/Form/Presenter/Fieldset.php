<?php

namespace Events\Form\Presenter;

use Doctrine\Common\Persistence\ObjectManager;
use Events\Entity\Presenter;

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
        parent::__construct($objectManager, $serviceLocator, new Presenter(), 'presenter');

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

        // Add tags field
        $this->add(array(
            'type'       => 'DoctrineModule\Form\Element\ObjectSelect',
            'name'       => 'tags',
            'options'    => array(
                'object_manager'  => $objectManager,
                'target_class'    => '\Events\Entity\Tag',
                'property'        => 'name',
                'is_method'       => true,
                'label'           => _('entity.presenter.tags'),
                'empty_option'    => _('form.dropdown.unselect'),
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
                'multiple' => 'multiple',
                'size'     => 5
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
        return array_merge(
            $this->_getImageInputFilterSpecification(),
            $this->_getTextsInputFilterSpecification(),
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
                'tags' => array(
                    'required' => false
                ),
            ));
    }
}