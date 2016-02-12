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
 * Texts trait
 *
 * @author		Joschi Kuphal <joschi@kuphal.net>
 */
trait Controller {
	/**
	 * Entity manager
	 * 
	 * @var Doctrine\ORM\EntityManager
	 */
	protected $entityManager;
	/**
	 * Flash messages
	 * 
	 * @var \array
	 */
	protected $flashMessages;
	/**
	 * Auth service
	 * 
	 * @var unknown
	 */
	protected $auth;
	/**
	 * Identity
	 * 
	 * @var \Auth\Entity\User
	 */
	protected $identity;
	
	/**
	 * Return identity
	 * 
	 * @return \Auth\Entity\User
	 */
	protected function getIdentity() {
		$this->auth 					= $this->getServiceLocator()->get('doctrine.authenticationservice.orm_default');
		$this->identity					= $this->auth->getIdentity();
		if ($this->identity instanceof \Auth\Entity\User) {
			$this->identity->setPassword(null);
		}
		return $this->identity;
	}
	
	/**
	 * Return flash messages
	 * 
	 * @return \array				Flash messages
	 */
	public function getFlashMessages() {
		return $this->flashMessages		= array(
			'error'						=> $this->flashMessenger()->getCurrentErrorMessages(),
			'success'					=> $this->flashMessenger()->getCurrentSuccessMessages(),
			'info'						=> $this->flashMessenger()->getCurrentInfoMessages(),
		);
	}
	
	/**
	 * get entityManager
	 *
	 * @return EntityManager
	 */
	private function getEntityManager() {
		if (null === $this->entityManager) {
			$this->entityManager = $this->getServiceLocator()->get('doctrine.entitymanager.orm_default');
		}
	
		return $this->entityManager;
	}
	
	/**
	 * Generic persist
	 * 
	 * @return \integer				Entity ID
	 */
	protected function persist(\Events\Entity\AbstractEntity $entity) {
		$id 							= $entity->getId();
		$id ? $entity->onBeforeUpdate() : $entity->onBeforeCreate();
		$entity->setSys_modified(new \DateTime('now'));
		$entity->setSys_author($this->identity()->getId());
		if (!$id) {
			$entity->setSys_creator($this->identity()->getId());
		}
		$this->getEntityManager()->persist($entity);
		$this->getEntityManager()->flush();
		if ($id ? $entity->onAfterUpdate() : $entity->onAfterCreate()) {
			$this->getEntityManager()->persist($entity);
			$this->getEntityManager()->flush();
		}
		return $entity->getId();
	}
}