<?php

/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */
namespace Events\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Events\Entity\Link;

class LinkController extends AbstractActionController {
	use\Events\Traits\Controller;
	
	/**
	 * Add action
	 *
	 * @return \Zend\View\Model\ViewModel
	 */
	public function addAction() {
		 
		// Create the form and inject the ObjectManager
		$form 								= new \Events\Form\Link\AddForm($this->getEntityManager(), $this->getServiceLocator());
		
		// Create a new, empty entity and bind it to the form
		$link								= new Link();
		if ($this->params('presenter')) {
			$link->setPresenter($this->getEntityManager()->getRepository('Events\Entity\Presenter')->findOneBy(array('id' => $this->params('presenter'))));
		} elseif($this->params('session')) {
			$link->setSession($this->getEntityManager()->getRepository('Events\Entity\Session')->findOneBy(array('id' => $this->params('session'))));
		}
		$form->bind($link);
		
		// If the form has been submitted
		if ($this->request->isPost()) {
			
			// Use the submitted data
			$form->setData($this->request->getPost());
			
			// If the form is valid
			if ($form->isValid()) {
				$this->persist($link);
				$this->flashMessenger()->addSuccessMessage('"'.$link->getName().'"' .' created');
				
				// Redirect to list view
				if (array_key_exists('createclose', $this->request->getPost())) {
					if ($link->getPresenter()) {
						$this->redirect()->toRoute('presenter', array('action' => 'edit', 'id' => $link->getPresenter()->getId()), array('fragment' => 'associations'));
					} else {
						$this->redirect()->toRoute('session', array('action' => 'edit', 'id' => $link->getSession()->getId()), array('fragment' => 'associations'));
					}
				} else {
					$this->redirect()->toRoute('link', array('action' => 'edit', 'id' => $link->getId()));
				}
			}
		}
		
		return array(
			'form'							=> $form,
			'link'							=> $link,
			'flashMessages'					=> $this->getFlashMessages(),
			'identity'						=> $this->getIdentity(),
		);
	}
	
	/**
	 * Edit action
	 * 
	 * @return \array					View parameters
	 */
	public function editAction() {
		$tmpimage								= null;

		// Create the form and inject the ObjectManager
		$form 								= new \Events\Form\Link\EditForm($this->getEntityManager(), $this->getServiceLocator());
		
		// Fetch the link and bind it to the form
		$link							= $this->getEntityManager()->getRepository('Events\Entity\Link')->findOneBy(array('id' => $this->params('id')));
		$form->bind($link);
		
		// If the form has been submitted
		if ($this->request->isPost()) {
			
			// Use the submitted data
			$form->setData($this->request->getPost());
				
			// If the form is valid
			if ($form->isValid()) {
				$this->persist($link);
				$this->flashMessenger()->addSuccessMessage('"'.$link->getName().'"' .' created');
				
				// Redirect to list view
				if (array_key_exists('saveclose', $this->request->getPost())) {
					if ($link->getPresenter()) {
						$this->redirect()->toRoute('presenter', array('action' => 'edit', 'id' => $link->getPresenter()->getId()), array('fragment' => 'associations'));
					} else {
						$this->redirect()->toRoute('session', array('action' => 'edit', 'id' => $link->getSession()->getId()), array('fragment' => 'associations'));
					}
				}
			}
		}
		
		return array (
			'form'							=> $form,
			'link'							=> $link,
			'flashMessages'					=> $this->getFlashMessages(),
			'identity'						=> $this->getIdentity(),
		);
	}
	
	/**
	 * Delete an link
	 * 
	 * @return void
	 */
	public function deleteAction() { 
		$link							= $this->getEntityManager()->getRepository('Events\Entity\Link')->findOneBy(array('id' => $this->params('id')));
		$link->setSys_deleted(1);
		$this->persist($link);
		if ($link->getPresenter()) {
			$this->redirect()->toRoute('presenter', array('action' => 'edit', 'id' => $link->getPresenter()->getId()), array('fragment' => 'associations'));
		} else {
			$this->redirect()->toRoute('session', array('action' => 'edit', 'id' => $link->getSession()->getId()), array('fragment' => 'associations'));
		}
	}
}
