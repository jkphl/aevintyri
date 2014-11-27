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
 * Tag entity
 * 
 * @ORM\Table (name="tag")
 * @ORM\Entity(repositoryClass="Events\Repository\EntityRepository") 
 * @author		Joschi Kuphal <joschi@kuphal.net>
 */
class Tag extends AbstractEntity {
	
	/**
	 * Name
	 *
	 * @var \string
	 * @ORM\Column(type="string")
	 */
	protected $name;
	
	/**
	 * Color
	 *
	 * @var \string
	 * @ORM\Column(type="string")
	 */
	protected $color;
	
	/**
	 * Presenters using this tag
	 * 
	 * @var \Doctrine\Common\Collections\ArrayCollection
	 * @ORM\ManyToMany(targetEntity="Presenter", mappedBy="tags", cascade={"all"})
	 */
	protected $presenters;
	
	/**
	 * Sessions using this tag
	 *
	 * @var \Doctrine\Common\Collections\ArrayCollection
	 * @ORM\ManyToMany(targetEntity="Session", mappedBy="tags", cascade={"all"})
	 */
	protected $sessions;
	
	/**
	 * Constructor
	 */
	public function __construct() {
		parent::__construct();
		$this->presenters		= new \Doctrine\Common\Collections\ArrayCollection();
		$this->sessions			= new \Doctrine\Common\Collections\ArrayCollection();
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
	 * @return the $color
	 */
	public function getColor() {
		return $this->color;
	}

	/**
	 * @param string $color
	 */
	public function setColor($color) {
		$this->color = $color;
	}
	
	/**
	 * @return the $presenters
	 */
	public function getPresenters() {
		return $this->presenters;
	}

	/**
	 * @param \Doctrine\Common\Collections\ArrayCollection $presenters
	 */
	public function setPresenters($presenters) {
		$this->presenters = $presenters;
	}

	/**
	 * @return the $sessions
	 */
	public function getSessions() {
		return $this->sessions;
	}

	/**
	 * @param \Doctrine\Common\Collections\ArrayCollection $sessions
	 */
	public function setSessions($sessions) {
		$this->sessions = $sessions;
	}
}