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
 * Link entity
 * 
 * @ORM\Table (name="link",uniqueConstraints={@ORM\UniqueConstraint(name="presenter_session_url",columns={"presenter","session","url"})})
 * @ORM\Entity(repositoryClass="Events\Repository\EntityRepository") 
 * @author		Joschi Kuphal <joschi@kuphal.net>
 */
class Link extends AbstractEntity {
	
	/**
	 * Name
	 *
	 * @var \string
	 * @ORM\Column(type="string")
	 */
	protected $name;
	
	/**
	 * URL
	 *
	 * @var \string
	 * @ORM\Column(type="string")
	 */
	protected $url;
	
	/**
	 * Sessions using this link
	 * 
	 * @var \Events\Entity\Session
	 * @ORM\ManyToOne(targetEntity="Session", inversedBy="links", cascade={"all"})
	 * @ORM\JoinColumn(name="session", referencedColumnName="id")
	 */
	protected $session;
	
	/**
	 * Presenters using this link
	 * 
	 * @var \Events\Entity\Presenter
	 * @ORM\ManyToOne(targetEntity="Presenter", inversedBy="links", cascade={"all"})
	 * @ORM\JoinColumn(name="presenter", referencedColumnName="id")
	 */
	protected $presenter;

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
	 * @return the $url
	 */
	public function getUrl() {
		return $this->url;
	}

	/**
	 * @param string $url
	 */
	public function setUrl($url) {
		$this->url = $url;
	}
	
	/**
	 * @return the $presenter
	 */
	public function getPresenter() {
		return $this->presenter;
	}

	/**
	 * @param \Events\Entity\Presenter $presenter
	 */
	public function setPresenter($presenter) {
		$this->presenter = $presenter;
	}
	
	/**
	 * @return the $session
	 */
	public function getSession() {
		return $this->session;
	}

	/**
	 * @param \Events\Entity\Session $session
	 */
	public function setSession($session) {
		$this->session = $session;
	}

}