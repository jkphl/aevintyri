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
 * Session entity mapper
 * 
 * @author		Joschi Kuphal <joschi@kuphal.net>
 */
class Session extends \API\V1\Mapper\AbstractMapper {
	/**
	 * Repository of this mapper
	 *
	 * @var \string
	 */
	protected $repository = 'Events\Entity\Session';
	
	/************************************************************************************************
	 * PRIVATE METHODS
	 ***********************************************************************************************/
	
	/**
	 * Map a single session
	 * 
	 * @param \Events\Entity\Session $session	Session
	 * @param boolean $dereference				Dereference external entities
	 * @return \array							Mapped session
	 */
	public static function map(\Events\Entity\Session $session, $dereference = false) {
		$mapped				= array(
			'id'			=> $session->getId(),
			'name'			=> $session->getName(),
				
			'start_time'	=> $session->getStart_time(true)->format('c'),
			'end_time'		=> $session->getEnd_time(true)->format('c'),
			'level'			=> intval($session->getLevel()),
			'requirements'	=> self::emptyValue($session->getRequirements()),
				
			'hashtags'		=> self::hashtags($session->getHashtag()),
			'description'	=> self::markdown($session->getDescription()),
			'abstract'		=> self::emptyValue($session->getAbstract()),
			
			'image'			=> self::image($session->getImage()),
			'room'			=> $session->getRoom() ? ($dereference ? \API\V1\Mapper\Room::map($session->getRoom(), $dereference) : $session->getRoom()->getId()) : null,

			'presenters'	=> array(),
			'links'			=> array(),
			'tags'			=> array(),
		);
		
		foreach ($session->getPresenters() as $presenter) {
			$mapped['presenters'][]		= $dereference ? \API\V1\Mapper\Presenter::map($presenter, $dereference) : $presenter->getId();
		}
		
		foreach ($session->getLinks() as $link) {
			$mapped['links'][]		= $dereference ? \API\V1\Mapper\Link::map($link, $dereference) : $link->getId();
		}
		
		foreach ($session->getTags() as $tag) {
			$mapped['tags'][]		= $dereference ? \API\V1\Mapper\Tag::map($tag, $dereference) : $tag->getId();
		}
		
		return $mapped;
	}
}