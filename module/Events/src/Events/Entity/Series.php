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

namespace Events\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * Series entity
 * 
 * @ORM\Entity(repositoryClass="Events\Repository\EntityRepository") 
 * @author		Joschi Kuphal <joschi@kuphal.net>
 */
class Series extends AbstractEventEntity {
	/**
	 * Events
	 *
	 * @var \Doctrine\Common\Collections\ArrayCollection
	 * @ORM\OneToMany(targetEntity="Event", mappedBy="series", cascade={"all"})
	 */
	protected $events;
	
	/**
	 * Constructor
	 */
	public function __construct() {
		parent::__construct();
		$this->events		= new \Doctrine\Common\Collections\ArrayCollection();
	}

	/**
	 * @return the $events
	 */
	public function getEvents() {
		return $this->events->filter(function($entry) { return !$entry->getSys_deleted(); });
	}
	
	/**
	 * @param \Doctrine\Common\Collections\ArrayCollection $events
	 */
	public function setEvents($events) {
		$this->events = $events;
	}

	/**
	 * Actions before record creation
	 *
	 * @return \boolean				Save once more
	 */
	public function onAfterCreate() {
		return $this->_persistImage('series');
	}
	
	/**
	 * Actions before record update
	 *
	 * @return void
	 */
	public function onBeforeUpdate() {
		return $this->_persistImage('series');
	}
}