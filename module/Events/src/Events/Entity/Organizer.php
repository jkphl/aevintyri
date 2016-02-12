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
 * Organizer entity
 * 
 * @ORM\Table (name="organizer")
 * @ORM\Entity(repositoryClass="Events\Repository\EntityRepository") 
 * @author		Joschi Kuphal <joschi@kuphal.net>
 */
class Organizer extends AbstractEntity {
	use \Events\Traits\Address;
	use \Events\Traits\Contact;
	use \Events\Traits\Image;
	
	/**
	 * Name
	 *
	 * @var \string
	 * @ORM\Column(type="string")
	 */
	protected $name;
	
	/**
	 * Company
	 *
	 * @var \string
	 * @ORM\Column(type="string")
	 */
	protected $company;
	
	/**
	 * Event collection
	 * 
	 * @var \Doctrine\Common\Collections\ArrayCollection
	 * @ORM\OneToMany(targetEntity="Event", mappedBy="organizer")
	 * @ORM\OneToMany(targetEntity="Series", mappedBy="organizer")
	 */
	protected $organizerOf;
	
	/**
	 * User group
	 *
	 * @var \Auth\Entity\Usergroup
	 * @ORM\ManyToOne(targetEntity="Auth\Entity\Usergroup")
	 * @ORM\JoinColumn(name="usergroup", referencedColumnName="id", nullable=false)
	 **/
	protected $usergroup;
	
	/**
	 * Constructor
	 */
	public function __construct() {
		parent::__construct();
		$this->organizerOf		= new \Doctrine\Common\Collections\ArrayCollection();
	}
	
	/**
	 * @return the $name
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * @param field_type $name
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * @return the $company
	 */
	public function getCompany() {
		return $this->company;
	}

	/**
	 * @param field_type $company
	 */
	public function setCompany($company) {
		$this->company = $company;
	}
	
	/**
	 * @return the $usergroup
	 */
	public function getUsergroup() {
		return $this->usergroup;
	}

	/**
	 * @param \Events\Entity\Usergroup $usergroup
	 */
	public function setUsergroup($usergroup) {
		$this->usergroup = $usergroup;
	}
	
	/**
	 * Actions before record creation
	 *
	 * @return \boolean				Save once more
	 */
	public function onAfterCreate() {
		return $this->_persistImage('organizer');
	}
	
	/**
	 * Actions before record update
	 *
	 * @return void
	 */
	public function onBeforeUpdate() {
		return $this->_persistImage('organizer');
	}
}