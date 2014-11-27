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
 * Presenter entity mapper
 * 
 * @author		Joschi Kuphal <joschi@kuphal.net>
 */
class Presenter extends \API\V1\Mapper\AbstractMapper {
	/**
	 * Repository of this mapper
	 *
	 * @var \string
	 */
	protected $repository = 'Events\Entity\Presenter';
	
	/************************************************************************************************
	 * PRIVATE METHODS
	 ***********************************************************************************************/
	
	/**
	 * Map a single presenter
	 * 
	 * @param \Events\Entity\Presenter $presenter	Presenter
	 * @param boolean $dereference					Dereference external entities
	 * @return \array								Mapped presenter
	 */
	public static function map(\Events\Entity\Presenter $presenter, $dereference = false) {
		$mapped					= array(
			'id'				=> $presenter->getId(),
			'name'				=> $presenter->getName(),

			'email'				=> self::emptyValue($presenter->getEmail()),
			'phone'				=> self::emptyValue($presenter->getPhone()),
			'fax'				=> self::emptyValue($presenter->getFax()),
			'cell'				=> self::emptyValue($presenter->getCell()),
			'web'				=> self::url($presenter->getWeb()),
			'facebook'			=> self::url($presenter->getFacebook()),
			'twitter'			=> self::url(self::TWITTER_URL.$presenter->getTwitter()),
			'xing'				=> self::url($presenter->getXing()),
			'gplus'				=> self::url($presenter->getGplus()),
				
			'hashtags'			=> self::hashtags($presenter->getHashtag()),
			'description'		=> self::markdown($presenter->getDescription()),
			'abstract'			=> self::emptyValue($presenter->getAbstract()),
			
			'image'				=> self::image($presenter->getImage()),
				
			'links'				=> array(),
			'tags'				=> array(),
		);
		
		foreach ($presenter->getLinks() as $link) {
			$mapped['links'][]	= $dereference ? \API\V1\Mapper\Link::map($link, $dereference) : $link->getId();
		}
			
		foreach ($presenter->getTags() as $tag) {
			$mapped['tags'][]	= $dereference ? \API\V1\Mapper\Tag::map($tag, $dereference) : $tag->getId();
		}
		
		return $mapped;
	}
}