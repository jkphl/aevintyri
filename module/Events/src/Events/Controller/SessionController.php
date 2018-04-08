<?php

/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Events\Controller;

use Events\Entity\Session;
use Zend\Mvc\Controller\AbstractActionController;

class SessionController extends AbstractActionController
{
    use\Events\Traits\Controller;

    /**
     * Add action
     *
     * @return \Zend\View\Model\ViewModel
     */
    public function addAction()
    {
        $day = $this->getEntityManager()->getRepository('Events\Entity\Day')
                    ->findOneBy(array('id' => $this->params('day')));

        // Create the form and inject the ObjectManager
        $form = new \Events\Form\Session\AddForm($this->getEntityManager(), $this->getServiceLocator());

        // Create a new, empty entity and bind it to the form
        $session = new Session();
        $session->setDay($day);
        $form->bind($session);

        // If the form has been submitted
        if ($this->request->isPost()) {

            // Use the submitted data
            $form->setData(array_merge_recursive($this->request->getPost()->toArray(),
                $this->request->getFiles()->toArray()));

            // If the form is valid
            if ($form->isValid()) {
                if (intval($form->getInputFilter()->get('session')->get('delete_image')->getValue())) {
                    $session->deleteImage();
                    $form->get('session')->get('image')->setValue($session->getImage());
                } elseif (($imageInputFilter = $form->getInputFilter()->get('session')
                                                    ->get('upload_image')) && is_array($imageInputFilterValue = $imageInputFilter->getValue()) && array_key_exists('tmp_name',
                        $imageInputFilterValue) && strlen($imageInputFilterValue['tmp_name'])) {
                    $session->deleteImage();
                    $session->setImage($imageInputFilter->getValue());
                    $form->get('session')->get('image')->setValue($session->getImage());
                }

                $this->persist($session);
                $form->get('session')->get('image')->setValue($session->getImage());
                $this->flashMessenger()->addSuccessMessage('"'.$session->getName().'"'.' created');

                // Redirect to list view
                if (array_key_exists('createclose', $this->request->getPost())) {
                    $this->redirect()->toRoute('event',
                        array('action' => 'edit', 'type' => 'single', 'id' => $session->getDay()->getEvent()->getId()),
                        array('fragment' => 'days'));
                } else {
                    $this->redirect()->toRoute('session', array('action' => 'edit', 'id' => $session->getId()));
                }
            } else {
                if (intval($form->getInputFilter()->get('session')->get('delete_image')->getValue())) {
                    $session->deleteImage();
                    $form->get('session')->get('image')->setValue($session->getImage());
                } elseif (($imageInputFilter = $form->getInputFilter()->get('session')
                                                    ->get('upload_image')) && ($imageInputFilter->isValid())) {
                    $session->setImage($imageInputFilter->getValue());
                    $form->get('session')->get('image')->setValue($session->getImage());
                }
            }
        }

        return array(
            'form'          => $form,
            'session'       => $session,
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
        $form = new \Events\Form\Session\EditForm($this->getEntityManager(), $this->getServiceLocator());

        // Fetch the session and bind it to the form
        $session = $this->getEntityManager()->getRepository('Events\Entity\Session')
                        ->findOneBy(array('id' => $this->params('id')));

        $form->bind($session);

        // If the form has been submitted
        if ($this->request->isPost()) {

            // Use the submitted data
            $form->setData(array_merge_recursive($this->request->getPost()->toArray(),
                $this->request->getFiles()->toArray()));

            // If the form is valid
            if ($form->isValid()) {
                if (intval($form->getInputFilter()->get('session')->get('delete_image')->getValue())) {
                    $session->deleteImage();
                    $form->get('session')->get('image')->setValue($session->getImage());
                } elseif (($imageInputFilter = $form->getInputFilter()->get('session')
                                                    ->get('upload_image')) && is_array($imageInputFilterValue = $imageInputFilter->getValue()) && array_key_exists('tmp_name',
                        $imageInputFilterValue) && strlen($imageInputFilterValue['tmp_name'])) {
                    $session->deleteImage();
                    $session->setImage($imageInputFilter->getValue());
                    $form->get('session')->get('image')->setValue($session->getImage());
                }

                $this->persist($session);
                $form->get('session')->get('image')->setValue($session->getImage());
                $this->flashMessenger()->addSuccessMessage('"'.$session->getName().'"'.' created');

                // Redirect to event editing
                if (array_key_exists('saveclose', $this->request->getPost())) {
                    $this->redirect()->toRoute('event',
                        array('action' => 'edit', 'type' => 'single', 'id' => $session->getDay()->getEvent()->getId()),
                        array('fragment' => 'days'));
                }

            } else {
                if (intval($form->getInputFilter()->get('session')->get('delete_image')->getValue())) {
                    $session->deleteImage();
                    $form->get('session')->get('image')->setValue($session->getImage());
                } elseif (($imageInputFilter = $form->getInputFilter()->get('session')
                                                    ->get('upload_image')) && ($imageInputFilter->isValid())) {
                    $session->setImage($imageInputFilter->getValue());
                    $form->get('session')->get('image')->setValue($session->getImage());
                }
            }
        }

        return array(
            'form'          => $form,
            'session'       => $session,
            'flashMessages' => $this->getFlashMessages(),
            'identity'      => $this->getIdentity(),
        );
    }

    /**
     * Delete an session
     *
     * @return void
     */
    public function deleteAction()
    {
        $session = $this->getEntityManager()->getRepository('Events\Entity\Session')
                        ->findOneBy(array('id' => $this->params('id')));
        $session->setSys_deleted(1);
        $this->persist($session);
        $this->redirect()->toRoute('event',
            array('action' => 'edit', 'type' => 'single', 'id' => $session->getDay()->getEvent()->getId()),
            array('fragment' => 'days'));
    }
}
