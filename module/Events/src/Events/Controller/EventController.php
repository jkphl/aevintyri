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
use Events\Entity;
use Events\Entity\Day;

class EventController extends AbstractActionController {
	use \Events\Traits\Controller;
	
	/**
	 * List action
	 *
	 * @return \Zend\View\Model\ViewModel
	 */
	public function listAction() {
		$type								= $this->params('type');
		return new ViewModel(array(
			'events'						=> $this->getEntityManager()->getRepository('Events\Entity\\'.(($type == 'series') ? 'Series' : 'Event'))->findAll(),
			'type'							=> $type,
		));
	}
	
	/**
	 * Add action
	 *
	 * @return \Zend\View\Model\ViewModel
	 */
	public function addAction() {
		$type								= $this->params('type');
		 
		// Create the form and inject the ObjectManager
		$form 								= new \Events\Form\Event\AddForm($this->getEntityManager(), $this->getServiceLocator());
		
		// Create a new, empty entity and bind it to the form
		$event								= ($type == 'series') ? new \Events\Entity\Series() : new \Events\Entity\Event();
		if (($type == 'single') && $this->params('series')) {
			$series							= $this->getEntityManager()->getRepository('Events\Entity\Series')->findOneBy(array('id' => $this->params('series')));
			$event->setSeries($series);
			$event->setOrganizer($series->getOrganizer());
		}
		$form->bind($event);
		
		// If the form has been submitted
		if ($this->request->isPost()) {
			
			// Use the submitted data
			$post							= array_merge_recursive($this->request->getPost()->toArray(), $this->request->getFiles()->toArray());
			$form->setData($post);
			
			// If the form is valid
			if ($form->isValid()) {
				if (intval($form->getInputFilter()->get('event')->get('delete_image')->getValue())) {
					$event->deleteImage();
					$form->get('event')->get('image')->setValue($event->getImage());
				} elseif (($imageInputFilter = $form->getInputFilter()->get('event')->get('upload_image')) && is_array($imageInputFilterValue = $imageInputFilter->getValue()) && array_key_exists('tmp_name', $imageInputFilterValue) && strlen($imageInputFilterValue['tmp_name'])) {
					$event->deleteImage();
					$event->setImage($imageInputFilter->getValue());
					$form->get('event')->get('image')->setValue($event->getImage());
				}
				
				$this->persist($event);
				$form->get('event')->get('image')->setValue($event->getImage());
				$this->flashMessenger()->addSuccessMessage('"'.$event->getName().'"' .' created');
				
				// Create a first day for this event
				if ($type == 'single') {
					$day					= new Day();
					$day->setEvent($event);
					$day->setDate(new \DateTime('tomorrow'));
					$this->persist($day);
				}
				
				// Redirect to list view
				if (array_key_exists('createclose', $this->request->getPost())) {
					$this->redirect()->toRoute('event', array('action' => 'show', 'type' => $type, 'id' => $event->getId()));
				} else {
					$this->redirect()->toRoute('event', array('action' => 'edit', 'type' => $type,'id' => $event->getId()));
				}
			} else {
				if (intval($form->getInputFilter()->get('event')->get('delete_image')->getValue())) {
					$event->deleteImage();
					$form->get('event')->get('image')->setValue($event->getImage());
				} elseif (($imageInputFilter = $form->getInputFilter()->get('event')->get('upload_image')) && ($imageInputFilter->isValid())) {
					$event->setImage($imageInputFilter->getValue());
					$form->get('event')->get('image')->setValue($event->getImage());
				}
			}
		}
		
		return array(
			'form'							=> $form,
			'event'							=> $event,
			'flashMessages'					=> $this->getFlashMessages(),
			'identity'						=> $this->getIdentity(),
			'type'							=> $type,
		);
	}
	
	/**
	 * Edit action
	 * 
	 * @return \array					View parameters
	 */
	public function editAction() {
		$tmpimage							= null;
		$type								= $this->params('type');
			
		// Create the form and inject the ObjectManager
		$form 								= new \Events\Form\Event\EditForm($this->getEntityManager(), $this->getServiceLocator());
		
		// Create a new, empty entity and bind it to the form
		$event								= $this->getEntityManager()->getRepository(($type == 'series') ? 'Events\Entity\Series' : 'Events\Entity\Event')->findOneBy(array('id' => $this->params('id')));
		$form->bind($event);
		
		// If the form has been submitted
		if ($this->request->isPost()) {
			
			// Use the submitted data
			$post							= array_merge_recursive($this->request->getPost()->toArray(), $this->request->getFiles()->toArray());
			$form->setData($post);
				
			// If the form is valid
			if ($form->isValid()) {
				if (intval($form->getInputFilter()->get('event')->get('delete_image')->getValue())) {
					$event->deleteImage();
					$form->get('event')->get('image')->setValue($event->getImage());
				} elseif (($imageInputFilter = $form->getInputFilter()->get('event')->get('upload_image')) && is_array($imageInputFilterValue = $imageInputFilter->getValue()) && array_key_exists('tmp_name', $imageInputFilterValue) && strlen($imageInputFilterValue['tmp_name'])) {
					$event->deleteImage();
					$event->setImage($imageInputFilter->getValue());
					$form->get('event')->get('image')->setValue($event->getImage());
				}
				
				$this->persist($event);
				$form->get('event')->get('image')->setValue($event->getImage());
				$this->flashMessenger()->addSuccessMessage('"'.$event->getName().'"' .' created');
				
				// Redirect to list view
				if (array_key_exists('saveclose', $this->request->getPost())) {
					$this->redirect()->toRoute('event', array('action' => 'show', 'type' => $type, 'id' => $event->getId()));
				}
			} else {
				if (intval($form->getInputFilter()->get('event')->get('delete_image')->getValue())) {
					$event->deleteImage();
					$form->get('event')->get('image')->setValue($event->getImage());
				} elseif (($imageInputFilter = $form->getInputFilter()->get('event')->get('upload_image')) && ($imageInputFilter->isValid())) {
					$event->setImage($imageInputFilter->getValue());
					$form->get('event')->get('image')->setValue($event->getImage());
				}
			}
		}
		
		return array (
			'form'							=> $form,
			'event'							=> $event,
			'flashMessages'					=> $this->getFlashMessages(),
			'identity'						=> $this->getIdentity(),
			'type'							=> $type,
		);
	}
	
	/**
	 * Show action
	 * 
	 * @return \array					View parameters
	 */
	public function showAction() {
		$type								= $this->params('type');
		$event								= $this->getEntityManager()->getRepository(($type == 'series') ? 'Events\Entity\Series' : 'Events\Entity\Event')->findOneBy(array('id' => $this->params('id')));
		return array (
			'event'							=> $event,
			'identity'						=> $this->getIdentity(),
			'type'							=> $type,
		);
	}
	
	/**
	 * Delete an event
	 * 
	 * @return void
	 */
	public function deleteAction() {
		$type								= $this->params('type');
		$event								= $this->getEntityManager()->getRepository(($type == 'series') ? 'Events\Entity\Series' : 'Events\Entity\Event')->findOneBy(array('id' => $this->params('id')));
		$event->setSys_deleted(1);
		$this->persist($event);
		
		// In case of event series: Unlink dependent events
		if ($type == 'series') {
			foreach ($this->getEntityManager()->getRepository('Events\Entity\Event')->findBy(array('series' => $event->getId())) as $subevent) {
				$subevent->setSeries(null);
				$this->persist($subevent);
			}
		}
		
		$this->redirect()->toRoute('event', array('action' => 'list', 'type' => $this->params('type')));
	}
	
	/**
	 * Show a simple event calendar
	 * 
	 * @return \array					View parameters
	 */
	public function calendarAction() {
		return array (
			'events'						=> $this->getEntityManager()->getRepository('Events\Entity\Event')->findCalendarEvents(),
			'identity'						=> $this->getIdentity(),
		);
	}
}