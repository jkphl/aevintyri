<?php

/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Events\Controller;

use Events\Entity\Presenter;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class PresenterController extends AbstractActionController
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
            'presenters' => $this->getEntityManager()->getRepository('Events\Entity\Presenter')->findAll()
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
        $form = new \Events\Form\Presenter\AddForm($this->getEntityManager(), $this->getServiceLocator());

        // Create a new, empty entity and bind it to the form
        $presenter = new Presenter();
        $form->bind($presenter);

        // If the form has been submitted
        if ($this->request->isPost()) {

            // Use the submitted data
            $form->setData(array_merge_recursive($this->request->getPost()->toArray(),
                $this->request->getFiles()->toArray()));

            // If the form is valid
            if ($form->isValid()) {
                if (intval($form->getInputFilter()->get('presenter')->get('delete_image')->getValue())) {
                    $presenter->deleteImage();
                    $form->get('presenter')->get('image')->setValue($presenter->getImage());
                } elseif (($imageInputFilter = $form->getInputFilter()->get('presenter')
                                                    ->get('upload_image')) && is_array($imageInputFilterValue = $imageInputFilter->getValue()) && array_key_exists('tmp_name',
                        $imageInputFilterValue) && strlen($imageInputFilterValue['tmp_name'])) {
                    $presenter->deleteImage();
                    $presenter->setImage($imageInputFilter->getValue());
                    $form->get('presenter')->get('image')->setValue($presenter->getImage());
                }

                $this->persist($presenter);
                $form->get('presenter')->get('image')->setValue($presenter->getImage());
                $this->flashMessenger()->addSuccessMessage('"'.$presenter->getName().'"'.' created');

                // Redirect to list view
                if (array_key_exists('createclose', $this->request->getPost())) {
                    $this->redirect()->toRoute('presenter', array('action' => 'show', 'id' => $presenter->getId()));
                } else {
                    $this->redirect()->toRoute('presenter', array('action' => 'edit', 'id' => $presenter->getId()));
                }
            } else {
                if (intval($form->getInputFilter()->get('presenter')->get('delete_image')->getValue())) {
                    $presenter->deleteImage();
                    $form->get('presenter')->get('image')->setValue($presenter->getImage());
                } elseif (($imageInputFilter = $form->getInputFilter()->get('presenter')
                                                    ->get('upload_image')) && ($imageInputFilter->isValid())) {
                    $presenter->setImage($imageInputFilter->getValue());
                    $form->get('presenter')->get('image')->setValue($presenter->getImage());
                }
            }
        }

        return array(
            'form'          => $form,
            'presenter'     => $presenter,
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
        $form = new \Events\Form\Presenter\EditForm($this->getEntityManager(), $this->getServiceLocator());

        // Fetch the presenter and bind it to the form
        $presenter = $this->getEntityManager()->getRepository('Events\Entity\Presenter')
                          ->findOneBy(array('id' => $this->params('id')));
        $form->bind($presenter);

        // If the form has been submitted
        if ($this->request->isPost()) {

            // Use the submitted data
            $post = array_merge_recursive($this->request->getPost()->toArray(), $this->request->getFiles()->toArray());
            $form->setData($post);

            // If the form is valid
            if ($form->isValid()) {
                if (intval($form->getInputFilter()->get('presenter')->get('delete_image')->getValue())) {
                    $presenter->deleteImage();
                    $form->get('presenter')->get('image')->setValue($presenter->getImage());
                } elseif (($imageInputFilter = $form->getInputFilter()->get('presenter')
                                                    ->get('upload_image')) && is_array($imageInputFilterValue = $imageInputFilter->getValue()) && array_key_exists('tmp_name',
                        $imageInputFilterValue) && strlen($imageInputFilterValue['tmp_name'])) {
                    $presenter->deleteImage();
                    $presenter->setImage($imageInputFilter->getValue());
                    $form->get('presenter')->get('image')->setValue($presenter->getImage());
                }

                $this->persist($presenter);
                $form->get('presenter')->get('image')->setValue($presenter->getImage());
                $this->flashMessenger()->addSuccessMessage('"'.$presenter->getName().'"'.' created');

                // Redirect to list view
                if (array_key_exists('saveclose', $this->request->getPost())) {
                    $this->redirect()->toRoute('presenter', array('action' => 'show', 'id' => $presenter->getId()));
                }
            } else {
                if (intval($form->getInputFilter()->get('presenter')->get('delete_image')->getValue())) {
                    $presenter->deleteImage();
                    $form->get('presenter')->get('image')->setValue($presenter->getImage());
                } elseif (($imageInputFilter = $form->getInputFilter()->get('presenter')
                                                    ->get('upload_image')) && ($imageInputFilter->isValid())) {
                    $presenter->setImage($imageInputFilter->getValue());
                    $form->get('presenter')->get('image')->setValue($presenter->getImage());
                }
            }
        }

        return array(
            'form'          => $form,
            'presenter'     => $presenter,
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
        $presenter = $this->getEntityManager()->getRepository('Events\Entity\Presenter')
                          ->findOneBy(array('id' => $this->params('id')));

        return array(
            'presenter' => $presenter,
            'identity'  => $this->getIdentity(),
        );
    }

    /**
     * Delete an presenter
     *
     * @return void
     */
    public function deleteAction()
    {
        $presenter = $this->getEntityManager()->getRepository('Events\Entity\Presenter')
                          ->findOneBy(array('id' => $this->params('id')));
        $presenter->setSys_deleted(1);
        $this->persist($presenter);
        $this->redirect()->toRoute('presenter', array('action' => 'list'));
    }
}
