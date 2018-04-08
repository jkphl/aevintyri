<?php

namespace Events\Validator;

class UniqueObject extends \DoctrineModule\Validator\UniqueObject
{

    /**
     *
     * @see https://github.com/doctrine/DoctrineModule/issues/252
     */
    public function isValid($value, $context = null)
    {
        if (array_key_exists('date', $context)) {
            $context['date'] = new \DateTime($context['date']);
        }
        if (array_key_exists('presenter', $context) && !strlen($context['presenter'])) {
            $context['presenter'] = null;
        }
        if (array_key_exists('session', $context) && !strlen($context['session'])) {
            $context['session'] = null;
        }

        return parent::isValid($context, $context);
    }
}