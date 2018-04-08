<?php

/**
 * Event management
 *
 * @category       Tollwerk
 * @package        Tollwerk_Events
 * @author         Joschi Kuphal <joschi@kuphal.net>
 * @copyright      Copyright © 2014 tollwerk GmbH <info@tollwerk.de>
 * @license        http://opensource.org/licenses/BSD-3-Clause	The BSD 3-Clause License
 */

namespace Events\Traits;

/**
 * Address fieldset trait
 *
 * @author        Joschi Kuphal <joschi@kuphal.net>
 */
trait AddressFieldset
{

    /**
     * Add all fields necessary for an address
     *
     * @return void
     */
    public function _addAddressFields()
    {
        $this->add(array(
            'type'    => 'Zend\Form\Element\Text',
            'name'    => 'street_address_1',
            'options' => array(
                'label' => _('entity.address.street_address_1')
            )
        ));
        $this->add(array(
            'type'    => 'Zend\Form\Element\Text',
            'name'    => 'street_address_2',
            'options' => array(
                'label' => _('entity.address.street_address_2')
            )
        ));
        $this->add(array(
            'type'    => 'Zend\Form\Element\Text',
            'name'    => 'co',
            'options' => array(
                'label' => _('entity.address.co')
            )
        ));
        $this->add(array(
            'type'    => 'Zend\Form\Element\Text',
            'name'    => 'postbox',
            'options' => array(
                'label' => _('entity.address.postbox')
            )
        ));
        $this->add(array(
            'type'    => 'Zend\Form\Element\Text',
            'name'    => 'postal_code',
            'options' => array(
                'label' => _('entity.address.postalcode')
            )
        ));
        $this->add(array(
            'type'    => 'Zend\Form\Element\Text',
            'name'    => 'locality',
            'options' => array(
                'label' => _('entity.address.locality')
            )
        ));

        // TODO: Make dropdown (OGAFP)
        $this->add(array(
            'type'    => 'Zend\Form\Element\Text',
            'name'    => 'region',
            'options' => array(
                'label' => _('entity.address.region')
            )
        ));
        $this->add(array(
            'type'       => 'DoctrineModule\Form\Element\ObjectSelect',
            'name'       => 'country',
            'options'    => array(
                'object_manager'  => $this->entityManager,
                'target_class'    => '\Events\Entity\Country',
                'property'        => 'name',
                'is_method'       => true,
                'label'           => _('entity.address.country'),
                'empty_option'    => _('form.dropdown.select'),
                'label_generator' => function ($entity) {
                    return $entity->getName();
                },
                'find_method'     => array(
                    'name'   => 'findBy',
                    'params' => array(
                        'params'  => array(),
                        'orderBy' => array('name' => 'ASC'),
                    ),
                ),
            ),
            'attributes' => array(
                'multiple' => false,
            ),
        ));
        $this->add(array(
            'type'    => 'Zend\Form\Element\Text',
            'name'    => 'latitude',
            'options' => array(
                'label' => _('entity.address.latitude')
            )
        ));
        $this->add(array(
            'type'    => 'Zend\Form\Element\Text',
            'name'    => 'longitude',
            'options' => array(
                'label' => _('entity.address.longitude')
            )
        ));
    }

    /**
     * Return the address specific input filter specification
     *
     * @return \array            Input filter specification
     */
    protected function _getAddressInputFilterSpecification()
    {
        return array(
            'street_address_1' => array(
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
            'street_address_2' => array(
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
            'co'               => array(
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
            'postbox'          => array(
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
            'postal_code'      => array(
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
            'locality'         => array(
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
            'latitude'         => array(
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
                        'name'    => 'Float',
                        'options' => array(
                            'messages' => array()
                        )
                    )
                )
            ),
            'longitude'        => array(
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
                        'name'    => 'Float',
                        'options' => array(
                            'messages' => array()
                        )
                    )
                )
            ),
        );
    }
}