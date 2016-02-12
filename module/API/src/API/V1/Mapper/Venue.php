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
 * Venue entity mapper
 * 
 * @author		Joschi Kuphal <joschi@kuphal.net>
 */
class Venue extends \API\V1\Mapper\AbstractMapper {
	/**
	 * Repository of this mapper
	 *
	 * @var \string
	 */
	protected $repository = 'Events\Entity\Venue';
	
	/************************************************************************************************
	 * PRIVATE METHODS
	 ***********************************************************************************************/
	
	/**
	 * Map a single venue
	 * 
	 * @param \Events\Entity\Venue $venue	Venue
	 * @param boolean $dereference				Dereference external entities
	 * @return \array							Mapped venue
	 */
	public static function map(\Events\Entity\Venue $venue, $dereference = false) {
		$mapped					= array(
			'id'				=> $venue->getId(),
			'name'				=> $venue->getName(),
				
			'street_address_1'	=> self::emptyValue($venue->getStreet_address_1()),
			'street_address_2'	=> self::emptyValue($venue->getStreet_address_2()),
			'co'				=> self::emptyValue($venue->getCo()),
			'postbox'			=> self::emptyValue($venue->getPostbox()),
			'postal_code'		=> self::emptyValue($venue->getPostal_code()),
			'locality'			=> self::emptyValue($venue->getLocality()),
			'region'			=> self::emptyValue($venue->getRegion()),
			'country'			=> $venue->getCountry() ? ($dereference ? \API\V1\Mapper\Country::map($venue->getCountry(), $dereference) : $venue->getCountry()->getId()) : null,
			'latitude'			=> self::float($venue->getLatitude()),
			'longitude'			=> self::float($venue->getLongitude()),
				
			'hashtags'			=> self::hashtags($venue->getHashtag()),
			'description'		=> self::markdown($venue->getDescription()),
			'abstract'			=> self::emptyValue($venue->getAbstract()),
			
			'image'				=> self::image($venue->getImage()),
		);
		return $mapped;
	}
}