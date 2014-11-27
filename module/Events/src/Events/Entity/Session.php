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
 * Session entity
 * 
 * @ORM\Table (name="session")
 * @ORM\Entity(repositoryClass="Events\Repository\EntityRepository") 
 * @author		Joschi Kuphal <joschi@kuphal.net>
 */
class Session extends AbstractEntity {
	use \Events\Traits\Texts;
	use \Events\Traits\Image;
	
	/**
	 * Name
	 *
	 * @var \string
	 * @ORM\Column(type="string")
	 */
	protected $name;
	
	/**
	 * Skill level
	 *
	 * @var \int
	 * @ORM\Column(type="smallint")
	 */
	protected $level;
	
	/**
	 * Requirements
	 *
	 * @var \string
	 * @ORM\Column(type="text")
	 */
	protected $requirements;

	/**
	 * Day
	 *
	 * @var \Events\Entity\Day
	 * @ORM\ManyToOne(targetEntity="Day")
	 * @ORM\JoinColumn(name="day", referencedColumnName="id", nullable=false)
	 **/
	protected $day;
	
	/**
	 * Start time
	 *
	 * @var \DateTime
	 * @ORM\Column(type="time")
	 */
	protected $start_time;
	
	/**
	 * End time
	 *
	 * @var \DateTime
	 * @ORM\Column(type="time")
	 */
	protected $end_time;

	/**
	 * Room
	 *
	 * @var \Events\Entity\Room
	 * @ORM\ManyToOne(targetEntity="Room")
	 * @ORM\JoinColumn(name="room", referencedColumnName="id", nullable=false)
	 **/
	protected $room;

	/**
	 * Presenters
	 *
	 * @var \Doctrine\Common\Collections\ArrayCollection
	 * @ORM\ManyToMany(targetEntity="Presenter", inversedBy="sessions", cascade={"all"})
	 * @ORM\JoinColumn(name="presenter", referencedColumnName="id", unique=true, nullable=true)
	 * @ORM\OrderBy({"name" = "ASC"})
	 */
	protected $presenters;
	
	/**
	 * Tags
	 *
	 * @var \Doctrine\Common\Collections\ArrayCollection
	 * @ORM\ManyToMany(targetEntity="Tag", inversedBy="sessions", cascade={"all"})
	 * @ORM\JoinColumn(name="tag", referencedColumnName="id", unique=true, nullable=true)
	 * @ORM\OrderBy({"name" = "ASC"})
	 */
	protected $tags;
	
	/**
	 * Links
	 *
	 * @var \Doctrine\Common\Collections\ArrayCollection
	 * @ORM\OneToMany(targetEntity="Link", mappedBy="session", cascade={"all"})
	 * @ORM\OrderBy({"name" = "ASC"})
	 */
	protected $links;
	
	/**
	 * Constructor
	 */
	public function __construct() {
		parent::__construct();
		$this->presenters	= new \Doctrine\Common\Collections\ArrayCollection();
		$this->tags			= new \Doctrine\Common\Collections\ArrayCollection();
		$this->links		= new \Doctrine\Common\Collections\ArrayCollection();
	}
	
	/**
	 * @return the $name
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * @param string $name
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * @return the $day
	 */
	public function getDay() {
		return $this->day;
	}

	/**
	 * @param \Events\Entity\Day $day
	 */
	public function setDay($day) {
		$this->day = $day;
	}

	/**
	 * Return the start time
	 * 
	 * @param \boolean $merge			Merge with the day
	 * @return \DateTime				Start time
	 */
	public function getStart_time($merge = false) {
		if ($merge) {
			$start				= clone $this->start_time;
			$date				= $this->getDay()->getDate();
			$day				= intval($date->format('j'));
			$month				= intval($date->format('n'));
			$year				= intval($date->format('Y'));
			return $start->setDate($year, $month, $day);
		} else {
			return $this->start_time;
		}
	}

	/**
	 * @param DateTime $start_time
	 */
	public function setStart_time($start_time) {
		$this->start_time = $start_time;
	}

	/**
	 * Return the end time
	 * 
	 * @param \boolean $merge			Merge with the day
	 * @return \DateTime				End time
	 */
	public function getEnd_time($merge = false) {
		if ($merge) {
			$end				= clone $this->end_time;
			$date				= $this->getDay()->getDate();
			$day				= intval($date->format('j'));
			$month				= intval($date->format('n'));
			$year				= intval($date->format('Y'));
			return $end->setDate($year, $month, $day);
		} else {
			return $this->end_time;
		}
	}

	/**
	 * @param DateTime $end_time
	 */
	public function setEnd_time($end_time) {
		$this->end_time = $end_time;
	}

	/**
	 * Get the session times
	 * 
	 * @return \string
	 */
	public function getTimes() {
		return $this->getStart_time()->format('H:i').' - '.$this->getEnd_time()->format('H:i');
	}
	
	/**
	 * @return the $presenters
	 */
	public function getPresenters() {
		return $this->presenters->filter(function($entry) { return !$entry->getSys_deleted(); });
	}

	/**
	 * @param \Doctrine\Common\Collections\ArrayCollection $presenters
	 */
	public function setPresenters($presenters) {
		$this->presenters = $presenters;
	}

	/**
	 * Adds presenters
	 *
	 * @param \Doctrine\Common\Collections\ArrayCollection $presenters
	 */
	public function addPresenters(\Doctrine\Common\Collections\ArrayCollection $presenters) {
		foreach ($presenters as $presenter) {
			if (!$this->presenters->contains($presenter)) {
				$this->presenters->add($presenter);
			}
		}
	}
	
	/**
	 * Removes presenters
	 *
	 * @param \Doctrine\Common\Collections\ArrayCollection $presenters
	 */
	public function removePresenters(\Doctrine\Common\Collections\ArrayCollection $presenters) {
		foreach ($presenters as $presenter) {
			if ($this->presenters->contains($presenter)) {
				$this->presenters->removeElement($presenter);
			}
		}
	}

	/**
	 * @return the $tags
	 */
	public function getTags() {
		return $this->tags->filter(function($entry) { return !$entry->getSys_deleted(); });
	}

	/**
	 * @param \Doctrine\Common\Collections\ArrayCollection $tags
	 */
	public function setTags($tags) {
		$this->tags = $tags;
	}

	/**
	 * Adds tags
	 *
	 * @param \Doctrine\Common\Collections\ArrayCollection $tags
	 */
	public function addTags(\Doctrine\Common\Collections\ArrayCollection $tags) {
		foreach ($tags as $tag) {
			if (!$this->tags->contains($tag)) {
				$this->tags->add($tag);
			}
		}
	}
	
	/**
	 * Removes tags
	 *
	 * @param \Doctrine\Common\Collections\ArrayCollection $tags
	 */
	public function removeTags(\Doctrine\Common\Collections\ArrayCollection $tags) {
		foreach ($tags as $tag) {
			if ($this->tags->contains($tag)) {
				$this->tags->removeElement($tag);
			}
		}
	}
	
	/**
	 * @return the $links
	 */
	public function getLinks() {
		return $this->links->filter(function($entry) { return !$entry->getSys_deleted(); });
	}

	/**
	 * @param \Doctrine\Common\Collections\ArrayCollection $links
	 */
	public function setLinks($links) {
		$this->links = $links;
	}
	
	/**
	 * @return the $level
	 */
	public function getLevel() {
		return $this->level;
	}

	/**
	 * @param int $level
	 */
	public function setLevel($level) {
		$this->level = $level;
	}

	/**
	 * @return the $requirements
	 */
	public function getRequirements() {
		return $this->requirements;
	}

	/**
	 * @param string $requirements
	 */
	public function setRequirements($requirements) {
		$this->requirements = $requirements;
	}
	
	/**
	 * @return the $room
	 */
	public function getRoom() {
		return $this->room;
	}

	/**
	 * @param \Events\Entity\Room $room
	 */
	public function setRoom($room) {
		$this->room = $room;
	}

	/**
	 * Actions before record creation
	 *
	 * @return \boolean				Save once more
	 */
	public function onAfterCreate() {
		return $this->_persistImage('session');
	}
	
	/**
	 * Actions before record update
	 *
	 * @return void
	 */
	public function onBeforeUpdate() {
		return $this->_persistImage('session');
	}
}