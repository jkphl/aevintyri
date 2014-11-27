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

namespace Auth\Entity;
use Doctrine\ORM\Mapping as ORM;
use Auth\Entity;

/**
 * User group entity
 * 
 * @ORM\Table (name="usergroup")
 * @ORM\Entity 
 * @author		Joschi Kuphal <joschi@kuphal.net>
 */
class Usergroup extends AbstractEntity {

    /**
     * Name
     * 
     * @var \string
     * @ORM\Column(name="name", type="string", length=50, nullable=false, unique=true)
     */
    protected $name;
    
    /**
     * Active
     *
     * @var \boolean
     * @ORM\Column(type="integer")
     */
    protected $active;
    
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
	 * @return the $active
	 */
	public function getActive() {
		return $this->active;
	}

	/**
	 * @param boolean $active
	 */
	public function setActive($active) {
		$this->active = $active;
	}
}