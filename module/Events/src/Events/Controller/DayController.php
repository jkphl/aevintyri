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
use Events\Entity\Day;

class DayController extends AbstractActionController {
	use\Events\Traits\Controller;
	
	/**
	 * List action
	 *
	 * @return \Zend\View\Model\ViewModel
	 */
	public function listAction() {
		return new ViewModel(array(
			'days' => $this->getEntityManager()->getRepository('Events\Entity\Day')->findAll()
		));
	}
	
	/**
	 * Add action
	 *
	 * @return \Zend\View\Model\ViewModel
	 */
	public function addAction() {
		 
		// Create the form and inject the ObjectManager
		$form 								= new \Events\Form\Day\AddForm($this->getEntityManager(), $this->getServiceLocator());
		
		// Create a new, empty entity and bind it to the form
		$day								= new Day();
		$day->setDate(new \DateTime('tomorrow'));
		$day->setEvent($this->getEntityManager()->getRepository('Events\Entity\Event')->findOneBy(array('id' => $this->params('event'))));
		$form->bind($day);
		
		// If the form has been submitted
		if ($this->request->isPost()) {
			
			// Use the submitted data
			$form->setData($this->request->getPost());
			
			// If the form is valid
			if ($form->isValid()) {
				$this->persist($day);
				$this->flashMessenger()->addSuccessMessage('"'.$day->getId().'"' .' created');
				
				// Redirect to list view
				if (array_key_exists('createclose', $this->request->getPost())) {
					$this->redirect()->toRoute('event', array('action' => 'edit', 'type' => 'single', 'id' => $day->getEvent()->getId()), array('fragment' => 'days'));
				} else {
					$this->redirect()->toRoute('day', array('action' => 'edit', 'id' => $day->getId()));
				}
			}
		}
		
		return array(
			'form'							=> $form,
			'day'							=> $day,
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

		// Create the form and inject the ObjectManager
		$form 								= new \Events\Form\Day\EditForm($this->getEntityManager(), $this->getServiceLocator());
		
		// Fetch the day and bind it to the form
		$day							= $this->getEntityManager()->getRepository('Events\Entity\Day')->findOneBy(array('id' => $this->params('id')));
		$form->bind($day);
		
		// If the form has been submitted
		if ($this->request->isPost()) {
			
			// Use the submitted data
			$form->setData($this->request->getPost());
				
			// If the form is valid
			if ($form->isValid()) {
				$this->persist($day);
				$this->flashMessenger()->addSuccessMessage('"'.$day->getId().'"' .' created');
				
				// Redirect to list view
				if (array_key_exists('saveclose', $this->request->getPost())) {
					$this->redirect()->toRoute('event', array('action' => 'edit', 'type' => 'single', 'id' => $day->getEvent()->getId()), array('fragment' => 'days'));
				}
			}
		}
		
		return array (
			'form'							=> $form,
			'day'							=> $day,
			'flashMessages'					=> $this->getFlashMessages(),
			'identity'						=> $this->getIdentity(),
		);
	}
	
	/**
	 * Show action
	 * 
	 * @return \array					View parameters
	 */
	public function showAction() {
		$day								= $this->getEntityManager()->getRepository('Events\Entity\Day')->findOneBy(array('id' => $this->params('id')));
		return array (
			'day'							=> $day,
			'identity'						=> $this->getIdentity(),
		);
	}
	
	/**
	 * Delete an day
	 * 
	 * @return void
	 */
	public function deleteAction() { 
		$day							= $this->getEntityManager()->getRepository('Events\Entity\Day')->findOneBy(array('id' => $this->params('id')));
		$day->setSys_deleted(1);
		$this->persist($day);
		$this->redirect()->toRoute('event', array('action' => 'edit', 'type' => 'single', 'id' => $day->getEvent()->getId()), array('fragment' => 'days'));
	}
}
