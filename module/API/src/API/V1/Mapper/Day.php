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
 * Day entity mapper
 * 
 * @author		Joschi Kuphal <joschi@kuphal.net>
 */
class Day extends \API\V1\Mapper\AbstractMapper {
	/**
	 * Repository of this mapper
	 *
	 * @var \string
	 */
	protected $repository = 'Events\Entity\Day';
	
	/************************************************************************************************
	 * PRIVATE METHODS
	 ***********************************************************************************************/
	
	/**
	 * Map a single day
	 * 
	 * @param \Events\Entity\Day $day		Day
	 * @param boolean $dereference			Dereference external entities
	 * @return \array						Mapped day
	 */
	public static function map(\Events\Entity\Day $day, $dereference = false) {
		$mapped			= array(
			'id'		=> $day->getId(),
			'date'		=> $day->getDate()->format('c'),
			'sessions'	=> array(),
		);
		
		foreach ($day->getSessions() as $session) {
			$mapped['sessions'][]		= $dereference ? \API\V1\Mapper\Session::map($session, $dereference) : $session->getId();
		}
		
		return $mapped;
	}
}