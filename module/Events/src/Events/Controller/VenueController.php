<?php

/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Events\Controller;

use Events\Entity\Room;
use Events\Entity\Venue;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class VenueController extends AbstractActionController
{
    use\Events\Traits\Controller;

    /**
     * List action
     *
     * @return \Zend\View\Model\ViewModel
     */
    public function listAction()
    {
        return new ViewModel(array(
            'venues' => $this->getEntityManager()->getRepository('Events\Entity\Venue')->findAll()
        ));
    }

    /**
     * Add action
     *
     * @return \Zend\View\Model\ViewModel
     */
    public function addAction()
    {

        // Create the form and inject the ObjectManager
        $form = new \Events\Form\Venue\AddForm($this->getEntityManager(), $this->getServiceLocator());

        // Create a new, empty entity and bind it to the form
        $venue = new Venue();
        $venue->setCountry($this->getServiceLocator()->get('Config')['defaults']['country']);
        $form->bind($venue);

        // If the form has been submitted
        if ($this->request->isPost()) {

            // Use the submitted data
            $post = array_merge_recursive($this->request->getPost()->toArray(), $this->request->getFiles()->toArray());
            $form->setData($post);

            // If the form is valid
            if ($form->isValid()) {
                if (intval($form->getInputFilter()->get('venue')->get('delete_image')->getValue())) {
                    $venue->deleteImage();
                    $form->get('venue')->get('image')->setValue($venue->getImage());
                } elseif (($imageInputFilter = $form->getInputFilter()->get('venue')
                                                    ->get('upload_image')) && is_array($imageInputFilterValue = $imageInputFilter->getValue()) && array_key_exists('tmp_name',
                        $imageInputFilterValue) && strlen($imageInputFilterValue['tmp_name'])) {
                    $venue->deleteImage();
                    $venue->setImage($imageInputFilter->getValue());
                    $form->get('venue')->get('image')->setValue($venue->getImage());
                }

                $this->persist($venue);
                $form->get('venue')->get('image')->setValue($venue->getImage());
                $this->flashMessenger()->addSuccessMessage('"'.$venue->getName().'"'.' created');

                // Create a first room for this venue
                $room = new Room();
                $room->setName('');
                $room->setNumber('');
                $room->setVenue($venue);
                $room->setAbstract('');
                $room->setDescription('');
                $room->setHashtag('');
                $this->persist($room);

                // Redirect to list view
                if (array_key_exists('createclose', $this->request->getPost())) {
                    $this->redirect()->toRoute('venue', array('action' => 'show', 'id' => $venue->getId()));
                } else {
                    $this->redirect()->toRoute('venue', array('action' => 'edit', 'id' => $venue->getId()));
                }
            } else {
                if (intval($form->getInputFilter()->get('venue')->get('delete_image')->getValue())) {
                    $venue->deleteImage();
                    $form->get('venue')->get('image')->setValue($venue->getImage());
                } elseif (($imageInputFilter = $form->getInputFilter()->get('venue')
                                                    ->get('upload_image')) && ($imageInputFilter->isValid())) {
                    $venue->setImage($imageInputFilter->getValue());
                    $form->get('venue')->get('image')->setValue($venue->getImage());
                }
            }
        }

        return array(
            'form'          => $form,
            'venue'         => $venue,
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
        $form = new \Events\Form\Venue\EditForm($this->getEntityManager(), $this->getServiceLocator());

        // Fetch the venue and bind it to the form
        $venue = $this->getEntityManager()->getRepository('Events\Entity\Venue')
                      ->findOneBy(array('id' => $this->params('id')));
        $form->bind($venue);

        // If the form has been submitted
        if ($this->request->isPost()) {

            // Use the submitted data
            $post = array_merge_recursive($this->request->getPost()->toArray(), $this->request->getFiles()->toArray());
            $form->setData($post);

            // If the form is valid
            if ($form->isValid()) {
                if (intval($form->getInputFilter()->get('venue')->get('delete_image')->getValue())) {
                    $venue->deleteImage();
                    $form->get('venue')->get('image')->setValue($venue->getImage());
                } elseif (($imageInputFilter = $form->getInputFilter()->get('venue')
                                                    ->get('upload_image')) && is_array($imageInputFilterValue = $imageInputFilter->getValue()) && array_key_exists('tmp_name',
                        $imageInputFilterValue) && strlen($imageInputFilterValue['tmp_name'])) {
                    $venue->deleteImage();
                    $venue->setImage($imageInputFilter->getValue());
                    $form->get('venue')->get('image')->setValue($venue->getImage());
                }

                $this->persist($venue);
                $form->get('venue')->get('image')->setValue($venue->getImage());
                $this->flashMessenger()->addSuccessMessage('"'.$venue->getName().'"'.' created');

                // Redirect to list view
                if (array_key_exists('saveclose', $this->request->getPost())) {
                    $this->redirect()->toRoute('venue', array('action' => 'show', 'id' => $venue->getId()));
                }
            } else {
                if (intval($form->getInputFilter()->get('venue')->get('delete_image')->getValue())) {
                    $venue->deleteImage();
                    $form->get('venue')->get('image')->setValue($venue->getImage());
                } elseif (($imageInputFilter = $form->getInputFilter()->get('venue')
                                                    ->get('upload_image')) && ($imageInputFilter->isValid())) {
                    $venue->setImage($imageInputFilter->getValue());
                    $form->get('venue')->get('image')->setValue($venue->getImage());
                }
            }
        }

        return array(
            'form'          => $form,
            'venue'         => $venue,
            'flashMessages' => $this->getFlashMessages(),
            'identity'      => $this->getIdentity(),
        );
    }

    /**
     * Show action
     *
     * @return \array                    View parameters
     */
    public function showAction()
    {
        $venue = $this->getEntityManager()->getRepository('Events\Entity\Venue')
                      ->findOneBy(array('id' => $this->params('id')));

        return array(
            'venue'    => $venue,
            'identity' => $this->getIdentity(),
            'country'  => $venue->getCountry() ? $this->getEntityManager()->getRepository('Events\Entity\Country')
                                                      ->findOneBy(array('id' => $venue->getCountry())) : null,
        );
    }

    /**
     * Delete an venue
     *
     * @return void
     */
    public function deleteAction()
    {
        $venue = $this->getEntityManager()->getRepository('Events\Entity\Venue')
                      ->findOneBy(array('id' => $this->params('id')));
        $venue->setSys_deleted(1);
        $this->persist($venue);
        $this->redirect()->toRoute('venue', array('action' => 'list'));
    }
}
