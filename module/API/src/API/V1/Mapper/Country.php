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

namespace API\V1\Mapper;

/**
 * Country entity mapper
 * 
 * @author		Joschi Kuphal <joschi@kuphal.net>
 */
class Country extends \API\V1\Mapper\AbstractMapper {
	/**
	 * Repository of this mapper
	 *
	 * @var \string
	 */
	protected $repository = 'Events\Entity\Country';
	
	/************************************************************************************************
	 * PRIVATE METHODS
	 ***********************************************************************************************/
	
	/**
	 * Map a single country
	 * 
	 * @param \Events\Entity\Country $country	Country
	 * @param boolean $dereference				Dereference external entities
	 * @return \array							Mapped country
	 */
	public static function map(\Events\Entity\Country $country, $dereference = false) {
		$mapped			= array(
			'id'		=> $country->getId(),
			'name'		=> $country->getName(),
		);
		return $mapped;
	}
}