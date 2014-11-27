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
namespace Auth\Options;

use Zend\Stdlib\AbstractOptions;

class ModuleOptions extends AbstractOptions {
	/**
	 * Turn off strict options mode
	 */
	protected $__strictMode__ = false;
	
	/**
	 *
	 * @var string
	 */
	protected $loginRedirectRoute = 'user';
	
	/**
	 *
	 * @var string
	 */
	protected $logoutRedirectRoute = 'user';
	
	/**
	 *
	 * @var string
	 */
	protected $senderEmailAdress = 'no-reply@example.com';
	
	/**
	 *
	 * @var bool
	 */
	protected $navMenu = true;
	
	/**
	 *
	 * @var bool
	 */
	protected $displayExceptions = true;
	protected $captchaCharNum = 3;
	
	/**
	 *
	 * @var string
	 */
	protected $authenticationService = 'doctrine.authenticationservice.orm_default';
	
	/**
	 * set login redirect route
	 *
	 * @param string $loginRedirectRoute        	
	 * @return ModuleOptions
	 */
	public function setLoginRedirectRoute($loginRedirectRoute) {
		$this->loginRedirectRoute = $loginRedirectRoute;
		
		return $this;
	}
	
	/**
	 * get login redirect route
	 *
	 * @return string
	 */
	public function getLoginRedirectRoute() {
		return $this->loginRedirectRoute;
	}
	
	/**
	 * set logout redirect route
	 *
	 * @param string $logoutRedirectRoute        	
	 * @return ModuleOptions
	 */
	public function setLogoutRedirectRoute($logoutRedirectRoute) {
		$this->logoutRedirectRoute = $logoutRedirectRoute;
		
		return $this;
	}
	
	/**
	 * get logout redirect route
	 *
	 * @return string
	 */
	public function getLogoutRedirectRoute() {
		return $this->logoutRedirectRoute;
	}
	
	/**
	 * set sender email address
	 *
	 * @param string $senderEmailAdress        	
	 * @return ModuleOptions
	 */
	public function setSenderEmailAdress($senderEmailAdress) {
		$this->senderEmailAdress = $senderEmailAdress;
		
		return $this;
	}
	
	/**
	 * get sender email address
	 *
	 * @return string
	 */
	public function getSenderEmailAdress() {
		return $this->senderEmailAdress;
	}
	
	/**
	 * set visibility of navigation menu
	 *
	 * @param bool $navMenu        	
	 * @return ModuleOptions
	 */
	public function setNavMenu($navMenu) {
		$this->navMenu = $navMenu;
		
		return $this;
	}
	
	/**
	 * get visibility of navigation menu
	 *
	 * @return string
	 */
	public function getNavMenu() {
		return $this->navMenu;
	}
	
	/**
	 * set display exceptions
	 *
	 * @param bool $displayExceptions        	
	 * @return ModuleOptions
	 */
	public function setDisplayExceptions($displayExceptions) {
		$this->displayExceptions = $displayExceptions;
		
		return $this;
	}
	
	/**
	 * get visibility of exception error messages
	 *
	 * @return bool
	 */
	public function getDisplayExceptions() {
		return $this->displayExceptions;
	}
	
	/**
	 * set captcha number of characters
	 *
	 * @return int
	 */
	public function setCaptchaCharNum($captchaCharNum) {
		$this->captchaCharNum = $captchaCharNum;
		
		return $this->captchaCharNum;
	}
	
	/**
	 * get captcha number of characters
	 *
	 * @return int
	 */
	public function getCaptchaCharNum() {
		return $this->captchaCharNum;
	}
	
	/**
	 * set authentication service from config file
	 *
	 * @param bool $authenticationService        	
	 * @return ModuleOptions
	 */
	public function setAuthenticationService($authenticationService) {
		$this->authenticationService = $authenticationService;
		
		return $this;
	}
	
	/**
	 * get authentication service from config file
	 *
	 * @return string
	 */
	public function getAuthenticationService() {
		return $this->authenticationService;
	}
}
