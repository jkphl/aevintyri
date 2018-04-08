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

namespace Events\Filter;

/**
 * Abstract base class for entities
 *
 * @author        Joschi Kuphal <joschi@kuphal.net>
 */
class Hashtag implements \Zend\Filter\FilterInterface
{
    public function filter($value)
    {
        return preg_replace('%^\#+%', '', $value);
    }
}