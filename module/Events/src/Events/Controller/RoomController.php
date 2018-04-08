<?php

/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @room      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Events\Controller;

use Events\Entity\Room;
use Zend\Mvc\Controller\AbstractActionController;

class RoomController extends AbstractActionController
{
    use\Events\Traits\Controller;

    /**
     * Add action
     *
     * @return \Zend\View\Model\ViewModel
     */
    public function addAction()
    {

        // Create the form and inject the ObjectManager
        $form = new \Events\Form\Room\AddForm($this->getEntityManager(), $this->getServiceLocator());

        // Create a new, empty entity and bind it to the form
        $room = new Room();
        $room->setVenue($this->getEntityManager()->getRepository('Events\Entity\Venue')
                             ->findOneBy(array('id' => $this->params('venue'))));
        $form->bind($room);

        // If the form has been submitted
        if ($this->request->isPost()) {

            // Use the submitted data
            $form->setData($this->request->getPost());

            // If the form is valid
            if ($form->isValid()) {
                $this->persist($room);
                $this->flashMessenger()->addSuccessMessage('"'.$room->getName().'"'.' created');

                // Redirect to list view
                if (array_key_exists('createclose', $this->request->getPost())) {
                    $this->redirect()->toRoute('venue', array('action' => 'edit', 'id' => $room->getVenue()->getId()));
                } else {
                    $this->redirect()->toRoute('room', array('action' => 'edit', 'id' => $room->getId()));
                }
            }
        }

        return array(
            'form'          => $form,
            'room'          => $room,
            'flashMessages' => $this->getFlashMessages(),
            'identity'      => $this->getIdentity(),
        );
    }

    /**
     * Edit action
     *
     * @return \array                    View parameters
     */
    public function editAction()
    {
        $tmpimage = null;

        // Create the form and inject the ObjectManager
        $form = new \Events\Form\Room\EditForm($this->getEntityManager(), $this->getServiceLocator());

        // Fetch the room and bind it to the form
        $room = $this->getEntityManager()->getRepository('Events\Entity\Room')
                     ->findOneBy(array('id' => $this->params('id')));
        $form->bind($room);

        // If the form has been submitted
        if ($this->request->isPost()) {

            // Use the submitted data
            $form->setData($this->request->getPost());

            // If the form is valid
            if ($form->isValid()) {
                $this->persist($room);
                $this->flashMessenger()->addSuccessMessage('"'.$room->getName().'"'.' created');

                // Redirect to list view
                if (array_key_exists('saveclose', $this->request->getPost())) {
                    $this->redirect()->toRoute('venue', array('action' => 'edit', 'id' => $room->getVenue()->getId()),
                        array('fragment' => 'rooms'));
                }
            }
        }

        return array(
            'form'          => $form,
            'room'          => $room,
            'flashMessages' => $this->getFlashMessages(),
            'identity'      => $this->getIdentity(),
        );
    }

    /**
     * Delete an room
     *
     * @return void
     */
    public function deleteAction()
    {
        $room = $this->getEntityManager()->getRepository('Events\Entity\Room')
                     ->findOneBy(array('id' => $this->params('id')));
        $room->setSys_deleted(1);
        $this->persist($room);
        $this->redirect()->toRoute('venue', array('action' => 'edit', 'id' => $room->getVenue()->getId()),
            array('fragment' => 'rooms'));
    }
}
