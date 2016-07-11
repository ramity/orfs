<?php

namespace ORFS\Bundle\StoreBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use ORFS\Bundle\StoreBundle\Entity\EventLogs;
use ORFS\Bundle\StoreBundle\Form\EventLogsType;

/**
 * EventLogs controller.
 *
 * @Route("/eventlogs")
 */
class EventLogsController extends Controller
{

    /**
     * Lists all EventLogs entities.
     *
     * @Route("/", name="eventlogs")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ORFSStoreBundle:EventLogs')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new EventLogs entity.
     *
     * @Route("/", name="eventlogs_create")
     * @Method("POST")
     * @Template("ORFSStoreBundle:EventLogs:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new EventLogs();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('eventlogs_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a EventLogs entity.
     *
     * @param EventLogs $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(EventLogs $entity)
    {
        $form = $this->createForm(new EventLogsType(), $entity, array(
            'action' => $this->generateUrl('eventlogs_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new EventLogs entity.
     *
     * @Route("/new", name="eventlogs_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new EventLogs();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a EventLogs entity.
     *
     * @Route("/{id}", name="eventlogs_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ORFSStoreBundle:EventLogs')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find EventLogs entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing EventLogs entity.
     *
     * @Route("/{id}/edit", name="eventlogs_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ORFSStoreBundle:EventLogs')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find EventLogs entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a EventLogs entity.
    *
    * @param EventLogs $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(EventLogs $entity)
    {
        $form = $this->createForm(new EventLogsType(), $entity, array(
            'action' => $this->generateUrl('eventlogs_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing EventLogs entity.
     *
     * @Route("/{id}", name="eventlogs_update")
     * @Method("PUT")
     * @Template("ORFSStoreBundle:EventLogs:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ORFSStoreBundle:EventLogs')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find EventLogs entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('eventlogs_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a EventLogs entity.
     *
     * @Route("/{id}", name="eventlogs_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ORFSStoreBundle:EventLogs')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find EventLogs entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('eventlogs'));
    }

    /**
     * Creates a form to delete a EventLogs entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('eventlogs_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
