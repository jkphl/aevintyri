<?php

/**
 * Event management
 *
 * @category	Tollwerk
 * @package		Tollwerk_Events
 * @author		Joschi Kuphal <joschi@kuphal.net>
 * @copyright	Copyright © 2014 tollwerk GmbH <info@tollwerk.de>
 * @license		http://opensource.org/licenses/BSD-3-Clause	The BSD 3-Clause License
 */
namespace API\V1\Validator;

class ListOfInteger extends \Zend\Validator\AbstractValidator {
	/**
	 * Returns true if and only if $value is an integer or a list of integers
	 *
	 * @param string $value        	
	 * @return bool
	 */
	public function isValid($value) {
		if (is_array($value)) {
			foreach ($value as $int) {
				if (strval(intval($value)) != strval($value)) {
					return false;
				}
			}
			return true;
		} else {
			return strval(intval($value)) == strval($value);
		}
	}
} 