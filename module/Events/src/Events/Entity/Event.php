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
 * Event entity
 * 
 * @ORM\Entity(repositoryClass="Events\Repository\EventRepository") 
 * @author		Joschi Kuphal <joschi@kuphal.net>
 */
class Event extends AbstractEventEntity {
	
	/**
	 * Event series
	 * 
	 * @var \Events\Entity\Series
	 * @ORM\OneToOne(targetEntity="Series")
	 * @ORM\JoinColumn(name="series", referencedColumnName="id", nullable=true)
	 **/
	protected $series;
	
	/**
	 * Days
	 *
	 * @var \Doctrine\Common\Collections\ArrayCollection
	 * @ORM\OneToMany(targetEntity="Day", mappedBy="event", cascade={"all"})
	 * @ORM\OrderBy({"date" = "ASC"})
	 */
	protected $days;
	
	/**
	 * Start time & date
	 *
	 * @var \DateTime
	 */
	protected $startDate;
	
	/**
	 * End time & date
	 *
	 * @var \DateTime
	 */
	protected $endDate;
	
	/**
	 * Facebook event
	 *
	 * @ORM\Column(type="string", nullable=true)
	 */
	protected $facebook_event;
	
	/**
	 * XING event
	 *
	 * @ORM\Column(type="string", nullable=true)
	 */
	protected $xing_event;
	
	/**
	 * Google+ event
	 *
	 * @ORM\Column(type="string", nullable=true)
	 */
	protected $gplus_event;
	
	/**
	 * Tickets page
	 *
	 * @ORM\Column(type="string", nullable=true)
	 */
	protected $tickets;
	
	/**
	 * Lanyrd page
	 *
	 * @ORM\Column(type="string", nullable=true)
	 */
	protected $lanyrd;
	
	/**
	 * Constructor
	 */
	public function __construct() {
		parent::__construct();
		$this->days		= new \Doctrine\Common\Collections\ArrayCollection();
	}
	
	/**
	 * @return the $series
	 */
	public function getSeries() {
		return $this->series;
	}

	/**
	 * @param \Events\Entity\Series $series
	 */
	public function setSeries($series) {
		$this->series = $series;
	}
	
	/**
	 * @return the $startDate
	 */
	public function getStartDate() {
		if (empty($this->startDate)) {
			$this->startDate = $this->getDays()->first();
		}
		return $this->startDate;
	}
	
	/**
	 * @param DateTime $startDate
	 */
	public function setStartDate($startDate) {
		$this->startDate = $startDate;
	}
	
	/**
	 * @return the $endDate
	 */
	public function getEndDate() {
		if (empty($this->endDate)) {
			$this->endDate = $this->getDays()->last();
		}
		return $this->endDate;
	}
	
	/**
	 * @param DateTime $endDate
	 */
	public function setEndDate($endDate) {
		$this->endDate = $endDate;
	}
	
	/**
	 * Get the extreme dates of this event
	 * 
	 * @return \array
	 */
	public function getDates() {
		$startDate		= $this->getStartDate();
		$endDate		= $this->getEndDate();
		return (($startDate instanceof \Events\Entity\Day) && ($endDate instanceof \Events\Entity\Day)) ? (($startDate->getDate()->format('Y-m-d') == $endDate->getDate()->format('Y-m-d')) ? array($startDate->getDate()) : array($startDate->getDate(), $endDate->getDate())) : array();
	}
	
	/**
	 * Get the extreme dates and times of this event
	 * 
	 * @return \array
	 */
	public function getDateTimes() {
		$startDate				= $this->getStartDate();
		$startDateTime			= null;
		if ($startDate instanceof \Events\Entity\Day) {
			$startDateTime		= clone $startDate->getDate();
			$startSession		= $startDate->getSessions()->first();
			if ($startSession instanceof \Events\Entity\Session) {
				$minutes		= intval($startSession->getStart_time()->format('G')) * 60 + intval(ltrim($startSession->getStart_time()->format('i'), '0'));
				$startDateTime->add(new \DateInterval('PT'.$minutes.'M'));				
			}
		}
		$endDate				= $this->getEndDate();
		$endDateTime			= null;
		if ($endDate instanceof \Events\Entity\Day) {
			$endDateTime		= clone $endDate->getDate();
			$endSession			= $endDate->getSessions()->last();
			if ($endSession instanceof \Events\Entity\Session) {
				$minutes		= intval($endSession->getEnd_time()->format('G')) * 60 + intval(ltrim($endSession->getEnd_time()->format('i'), '0'));
				$endDateTime->add(new \DateInterval('PT'.$minutes.'M'));				
			}
		}
		return (($startDateTime instanceof \DateTime) && ($endDateTime instanceof \DateTime)) ? (($startDateTime->format('r') == $endDateTime->format('r')) ? array($startDateTime) : array($startDateTime, $endDateTime)) : array();
	}
	
	/**
	 * @return \Doctrine\Common\Collections\ArrayCollection $days
	 */
	public function getDays() {
		return $this->days->filter(function($entry) { return !$entry->getSys_deleted(); });
	}

	/**
	 * @param \Doctrine\Common\Collections\ArrayCollection $days
	 */
	public function setDays($days) {
		$this->days = $days;
	}
	
	/**
	 * Return all sessions of this event
	 * 
	 * @return \array
	 */
	public function getSessions() {
		$sessions				= array();
		
		/* @var $day \Events\Entity\Day */
		foreach ($this->getDays() as $day) {
			foreach ($day->getSessions() as $session) {
				$sessions[]		= $session;
			}
		}
		return $sessions;
	}
	
	/**
	 * Return the cumulated tags of all sessions
	 * 
	 * @return \array				Tags
	 */
	public function getTags() {
		$tags					= array();
		
		/* @var $day \Events\Entity\Day */
		foreach ($this->getDays() as $day) {
			
			/* @var $session \Events\Entity\Session */
			foreach ($day->getSessions() as $session) {

				/* @var $tag \Events\Entity\Tag */
				foreach ($session->getTags() as $tag) {
					$tags[$tag->getId()] = $tag;
				}
			}
		}
		
		usort($tags, function($tag1, $tag2) {
			if ($tag1->getName() == $tag2->getName()) {
				return 0;
			} else {
				return strcmp($tag1->getName(), $tag2->getName());
			}
		});
		return array_values($tags);
	}
	
	/**
	 * Actions before record creation
	 *
	 * @return \boolean				Save once more
	 */
	public function onAfterCreate() {
		return $this->_persistImage('event');
	}
	
	/**
	 * Actions before record update
	 *
	 * @return void
	 */
	public function onBeforeUpdate() {
		return $this->_persistImage('event');
	}
	
	/**
	 * @return the $facebook_event
	 */
	public function getFacebook_event() {
		return $this->facebook_event;
	}

	/**
	 * @param field_type $facebook_event
	 */
	public function setFacebook_event($facebook_event) {
		$this->facebook_event = $facebook_event;
	}

	/**
	 * @return the $xing_event
	 */
	public function getXing_event() {
		return $this->xing_event;
	}

	/**
	 * @param field_type $xing_event
	 */
	public function setXing_event($xing_event) {
		$this->xing_event = $xing_event;
	}

	/**
	 * @return the $gplus_event
	 */
	public function getGplus_event() {
		return $this->gplus_event;
	}

	/**
	 * @param field_type $gplus_event
	 */
	public function setGplus_event($gplus_event) {
		$this->gplus_event = $gplus_event;
	}

	/**
	 * @return the $tickets
	 */
	public function getTickets() {
		return $this->tickets;
	}

	/**
	 * @param field_type $tickets
	 */
	public function setTickets($tickets) {
		$this->tickets = $tickets;
	}

	/**
	 * @return the $lanyrd
	 */
	public function getLanyrd() {
		return $this->lanyrd;
	}

	/**
	 * @param field_type $lanyrd
	 */
	public function setLanyrd($lanyrd) {
		$this->lanyrd = $lanyrd;
	}
}