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
 * Series entity mapper
 * 
 * @author		Joschi Kuphal <joschi@kuphal.net>
 */
class Series extends \API\V1\Mapper\AbstractMapper {
	/**
	 * Repository of this mapper
	 *
	 * @var \string
	 */
	protected $repository = 'Events\Entity\Series';
	
	/************************************************************************************************
	 * PRIVATE METHODS
	 ***********************************************************************************************/
	
	/**
	 * Map a single event series
	 * 
	 * @param \Events\Entity\Series $series	Event series
	 * @param boolean $dereference			Dereference external entities
	 * @return \array						Mapped series
	 */
	public static function map(\Events\Entity\Series $series, $dereference = false) {
		$mapped				= array(
			'id'			=> $series->getId(),
			'name'			=> $series->getName(),
				
			'email'			=> self::emptyValue($series->getEmail()),
			'phone'			=> self::emptyValue($series->getPhone()),
			'fax'			=> self::emptyValue($series->getFax()),
			'cell'			=> self::emptyValue($series->getCell()),
			'web'			=> self::url($series->getWeb()),
			'facebook'		=> self::url($series->getFacebook()),
			'twitter'		=> self::url(self::TWITTER_URL.$series->getTwitter()),
			'xing'			=> self::url($series->getXing()),
			'gplus'			=> self::url($series->getGplus()),
				
			'hashtags'		=> self::hashtags($series->getHashtag()),
			'description'	=> self::markdown($series->getDescription()),
			'abstract'		=> self::emptyValue($series->getAbstract()),
			
			'image'			=> self::image($series->getImage()),
				
			'organizer'		=> $series->getOrganizer() ? ($dereference ? \API\V1\Mapper\Organizer::map($series->getOrganizer(), $dereference) : $series->getOrganizer()->getId()) : null,
		);
		return $mapped;
	}
}