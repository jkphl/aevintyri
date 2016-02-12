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
 * Country entity
 * 
 * @ORM\Table (name="country")
 * @ORM\Entity(repositoryClass="Events\Repository\EntityRepository") 
 * @author		Joschi Kuphal <joschi@kuphal.net>
 */
class Country extends AbstractEntity {
	/**
	 * Unique entity ID (ISO-3166-1 numerical country code)
	 *
	 * @var \integer
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 */
	protected $id;
	
	/**
	 * Name
	 *
	 * @var \string
	 * @ORM\Column(type="string")
	 */
	protected $name;

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
}