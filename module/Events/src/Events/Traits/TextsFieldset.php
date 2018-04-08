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
 * Texts fieldset trait
 *
 * @author        Joschi Kuphal <joschi@kuphal.net>
 */
trait TextsFieldset
{

    /**
     * Add all fields necessary for contact details
     *
     * @return void
     */
    public function _addTextsFields()
    {
        $this->add(array(
            'type'    => 'Zend\Form\Element\Text',
            'name'    => 'hashtag',
            'options' => array(
                'label' => _('entity.description.hashtag')
            )
        ));
        $this->add(array(
            'type'    => 'Zend\Form\Element\Text',
            'name'    => 'abstract',
            'options' => array(
                'label' => _('entity.description.abstract')
            )
        ));
        $this->add(array(
            'type'       => 'Zend\Form\Element\Textarea',
            'name'       => 'description',
            'options'    => array(
                'label' => _('entity.description.description')
            ),
            'attributes' => array(
                'rows' => '10',
            ),
        ));
    }

    /**
     * Return the description specific input filter specification
     *
     * @return \array            Input filter specification
     */
    protected function _getTextsInputFilterSpecification()
    {
        return array(
            'hashtag'     => array(
                'required' => false,
                'filters'  => array(
                    array(
                        'name' => 'StripTags'
                    ),
                    array(
                        'name' => 'StringTrim'
                    ),
                    array(
                        'name' => 'Events\Filter\Hashtag'
                    )
                ),
            ),
            'abstract'    => array(
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
            'description' => array(
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
        );
    }
}