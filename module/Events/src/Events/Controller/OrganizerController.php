<?php

/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Events\Controller;

use Events\Entity\Organizer;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class OrganizerController extends AbstractActionController
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
            'organizers' => $this->getEntityManager()->getRepository('Events\Entity\Organizer')->findAll()
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
        $form = new \Events\Form\Organizer\AddForm($this->getEntityManager(), $this->getServiceLocator());

        // Create a new, empty entity and bind it to the form
        $organizer = new Organizer();
        $organizer->setCountry($this->getServiceLocator()->get('Config')['defaults']['country']);
        $form->bind($organizer);

        // If the form has been submitted
        if ($this->request->isPost()) {

            // Use the submitted data
            $post = array_merge_recursive($this->request->getPost()->toArray(), $this->request->getFiles()->toArray());
            $form->setData($post);

            // If the form is valid
            if ($form->isValid()) {
                if (intval($form->getInputFilter()->get('organizer')->get('delete_image')->getValue())) {
                    $organizer->deleteImage();
                    $form->get('organizer')->get('image')->setValue($organizer->getImage());
                } elseif (($imageInputFilter = $form->getInputFilter()->get('organizer')
                                                    ->get('upload_image')) && is_array($imageInputFilterValue = $imageInputFilter->getValue()) && array_key_exists('tmp_name',
                        $imageInputFilterValue) && strlen($imageInputFilterValue['tmp_name'])) {
                    $organizer->deleteImage();
                    $organizer->setImage($imageInputFilter->getValue());
                    $form->get('organizer')->get('image')->setValue($organizer->getImage());
                }

                $organizer->setUsergroup($this->identity()->getUsergroup());
                $this->persist($organizer);
                $form->get('organizer')->get('image')->setValue($organizer->getImage());
                $this->flashMessenger()->addSuccessMessage('"'.$organizer->getName().'"'.' created');

                // Redirect to list view
                if (array_key_exists('createclose', $this->request->getPost())) {
                    $this->redirect()->toRoute('organizer', array('action' => 'show', 'id' => $organizer->getId()));
                } else {
                    $this->redirect()->toRoute('organizer', array('action' => 'edit', 'id' => $organizer->getId()));
                }
            } else {
                if (intval($form->getInputFilter()->get('organizer')->get('delete_image')->getValue())) {
                    $organizer->deleteImage();
                    $form->get('organizer')->get('image')->setValue($organizer->getImage());
                } elseif (($imageInputFilter = $form->getInputFilter()->get('organizer')
                                                    ->get('upload_image')) && ($imageInputFilter->isValid())) {
                    $organizer->setImage($imageInputFilter->getValue());
                    $form->get('organizer')->get('image')->setValue($organizer->getImage());
                }
            }
        }

        return array(
            'form'          => $form,
            'organizer'     => $organizer,
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
        $form = new \Events\Form\Organizer\EditForm($this->getEntityManager(), $this->getServiceLocator());

        // Fetch the organizer and bind it to the form
        $organizer = $this->getEntityManager()->getRepository('Events\Entity\Organizer')
                          ->findOneBy(array('id' => $this->params('id')));
        $form->bind($organizer);

        // If the form has been submitted
        if ($this->request->isPost()) {

            // Use the submitted data
            $post = array_merge_recursive($this->request->getPost()->toArray(), $this->request->getFiles()->toArray());
            $form->setData($post);

            // If the form is valid
            if ($form->isValid()) {
                if (intval($form->getInputFilter()->get('organizer')->get('delete_image')->getValue())) {
                    $organizer->deleteImage();
                    $form->get('organizer')->get('image')->setValue($organizer->getImage());
                } elseif (($imageInputFilter = $form->getInputFilter()->get('organizer')
                                                    ->get('upload_image')) && is_array($imageInputFilterValue = $imageInputFilter->getValue()) && array_key_exists('tmp_name',
                        $imageInputFilterValue) && strlen($imageInputFilterValue['tmp_name'])) {
                    $organizer->deleteImage();
                    $organizer->setImage($imageInputFilter->getValue());
                    $form->get('organizer')->get('image')->setValue($organizer->getImage());
                }

                $this->persist($organizer);
                $form->get('organizer')->get('image')->setValue($organizer->getImage());
                $this->flashMessenger()->addSuccessMessage('"'.$organizer->getName().'"'.' created');

                // Redirect to list view
                if (array_key_exists('saveclose', $this->request->getPost())) {
                    $this->redirect()->toRoute('organizer', array('action' => 'show', 'id' => $organizer->getId()));
                }
            } else {
                if (intval($form->getInputFilter()->get('organizer')->get('delete_image')->getValue())) {
                    $organizer->deleteImage();
                    $form->get('organizer')->get('image')->setValue($organizer->getImage());
                } elseif (($imageInputFilter = $form->getInputFilter()->get('organizer')
                                                    ->get('upload_image')) && ($imageInputFilter->isValid())) {
                    $organizer->setImage($imageInputFilter->getValue());
                    $form->get('organizer')->get('image')->setValue($organizer->getImage());
                }
            }
        }

        return array(
            'form'          => $form,
            'organizer'     => $organizer,
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
        $organizer = $this->getEntityManager()->getRepository('Events\Entity\Organizer')
                          ->findOneBy(array('id' => $this->params('id')));

        return array(
            'organizer' => $organizer,
            'identity'  => $this->getIdentity(),
            'country'   => $organizer->getCountry() ? $this->getEntityManager()->getRepository('Events\Entity\Country')
                                                           ->findOneBy(array('id' => $organizer->getCountry())) : null,
        );
    }

    /**
     * Delete an organizer
     *
     * @return void
     */
    public function deleteAction()
    {
        $organizer = $this->getEntityManager()->getRepository('Events\Entity\Organizer')
                          ->findOneBy(array('id' => $this->params('id')));
        $organizer->setSys_deleted(1);
        $this->persist($organizer);
        $this->redirect()->toRoute('organizer', array('action' => 'list'));
    }
}
