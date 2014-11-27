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

namespace Events\Traits;

/**
 * Contact trait
 *
 * @author		Joschi Kuphal <joschi@kuphal.net>
 */
trait Contact {
	/**
	 * Email address
	 *
     * @ORM\Column(type="string", nullable=true)
	 */
	protected $email;
	/**
	 * Phone number
	 *
     * @ORM\Column(type="string", nullable=true)
	 */
	protected $phone;
	/**
	 * Fax number
	 *
     * @ORM\Column(type="string", nullable=true)
	 */
	protected $fax;
	/**
	 * Cell phone number
	 *
     * @ORM\Column(type="string", nullable=true)
	 */
	protected $cell;
	/**
	 * Website
	 *
     * @ORM\Column(type="string", nullable=true)
	 */
	protected $web;
	/**
	 * Facebook profile
	 *
     * @ORM\Column(type="string", nullable=true)
	 */
	protected $facebook;
	/**
	 * Twitter profile
	 *
     * @ORM\Column(type="string", nullable=true)
	 */
	protected $twitter;
	/**
	 * XING profile
	 *
     * @ORM\Column(type="string", nullable=true)
	 */
	protected $xing;
	/**
	 * Google+ profile
	 *
     * @ORM\Column(type="string", nullable=true)
	 */
	protected $gplus;
	
	/**
	 * @return the $email
	 */
	public function getEmail() {
		return $this->email;
	}

	/**
	 * @param field_type $email
	 */
	public function setEmail($email) {
		$this->email = $email;
	}

	/**
	 * @return the $phone
	 */
	public function getPhone() {
		return $this->phone;
	}

	/**
	 * @param field_type $phone
	 */
	public function setPhone($phone) {
		$this->phone = $phone;
	}

	/**
	 * @return the $fax
	 */
	public function getFax() {
		return $this->fax;
	}

	/**
	 * @param field_type $fax
	 */
	public function setFax($fax) {
		$this->fax = $fax;
	}

	/**
	 * @return the $cell
	 */
	public function getCell() {
		return $this->cell;
	}

	/**
	 * @param field_type $cell
	 */
	public function setCell($cell) {
		$this->cell = $cell;
	}

	/**
	 * @return the $facebook
	 */
	public function getFacebook() {
		return $this->facebook;
	}

	/**
	 * @param field_type $facebook
	 */
	public function setFacebook($facebook) {
		$this->facebook = $facebook;
	}

	/**
	 * @return the $twitter
	 */
	public function getTwitter() {
		return $this->twitter;
	}

	/**
	 * @param field_type $twitter
	 */
	public function setTwitter($twitter) {
		$this->twitter = $twitter;
	}

	/**
	 * @return the $xing
	 */
	public function getXing() {
		return $this->xing;
	}

	/**
	 * @param field_type $xing
	 */
	public function setXing($xing) {
		$this->xing = $xing;
	}

	/**
	 * @return the $gplus
	 */
	public function getGplus() {
		return $this->gplus;
	}

	/**
	 * @param field_type $gplus
	 */
	public function setGplus($gplus) {
		$this->gplus = $gplus;
	}
	/**
	 * @return the $web
	 */
	public function getWeb() {
		return $this->web;
	}

	/**
	 * @param field_type $web
	 */
	public function setWeb($web) {
		$this->web = $web;
	}

}