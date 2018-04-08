<?php

/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Events\Controller;

use Events\Entity\Tag;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class TagController extends AbstractActionController
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
            'tags' => $this->getEntityManager()->getRepository('Events\Entity\Tag')->findAll()
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
        $form = new \Events\Form\Tag\AddForm($this->getEntityManager(), $this->getServiceLocator());

        // Create a new, empty entity and bind it to the form
        $tag = new Tag();
        $form->bind($tag);

        // If the form has been submitted
        if ($this->request->isPost()) {

            // Use the submitted data
            $form->setData($this->request->getPost());

            // If the form is valid
            if ($form->isValid()) {
                $this->persist($tag);
                $this->flashMessenger()->addSuccessMessage('"'.$tag->getName().'"'.' created');

                // Redirect to list view
                if (array_key_exists('createclose', $this->request->getPost())) {
                    $this->redirect()->toRoute('tag', array('action' => 'show', 'id' => $tag->getId()));
                } else {
                    $this->redirect()->toRoute('tag', array('action' => 'edit', 'id' => $tag->getId()));
                }
            }
        }

        return array(
            'form'          => $form,
            'tag'           => $tag,
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

        // Create the form and inject the ObjectManager
        $form = new \Events\Form\Tag\EditForm($this->getEntityManager(), $this->getServiceLocator());

        // Fetch the tag and bind it to the form
        $tag = $this->getEntityManager()->getRepository('Events\Entity\Tag')
                    ->findOneBy(array('id' => $this->params('id')));
        $form->bind($tag);

        // If the form has been submitted
        if ($this->request->isPost()) {

            // Use the submitted data
            $form->setData($this->request->getPost());

            // If the form is valid
            if ($form->isValid()) {
                $this->persist($tag);
                $this->flashMessenger()->addSuccessMessage('"'.$tag->getName().'"'.' created');

                // Redirect to list view
                if (array_key_exists('saveclose', $this->request->getPost())) {
                    $this->redirect()->toRoute('tag', array('action' => 'show', 'id' => $tag->getId()));
                }
            }
        }

        return array(
            'form'          => $form,
            'tag'           => $tag,
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
        $tag = $this->getEntityManager()->getRepository('Events\Entity\Tag')
                    ->findOneBy(array('id' => $this->params('id')));

        return array(
            'tag'      => $tag,
            'identity' => $this->getIdentity(),
        );
    }

    /**
     * Delete an tag
     *
     * @return void
     */
    public function deleteAction()
    {
        $tag = $this->getEntityManager()->getRepository('Events\Entity\Tag')
                    ->findOneBy(array('id' => $this->params('id')));
        $tag->setSys_deleted(1);
        $this->persist($tag);
        $this->redirect()->toRoute('tag', array('action' => 'list'));
    }
}
