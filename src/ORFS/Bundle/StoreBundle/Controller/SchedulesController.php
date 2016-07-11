<?php

namespace ORFS\Bundle\StoreBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use ORFS\Bundle\StoreBundle\Entity\Schedules;
use ORFS\Bundle\StoreBundle\Form\SchedulesType;

/**
 * Schedules controller.
 *
 * @Route("/schedules")
 */
class SchedulesController extends Controller
{

    /**
     * Lists all Schedules entities.
     *
     * @Route("/", name="schedules")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ORFSStoreBundle:Schedules')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Schedules entity.
     *
     * @Route("/", name="schedules_create")
     * @Method("POST")
     * @Template("ORFSStoreBundle:Schedules:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Schedules();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('schedules_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Schedules entity.
     *
     * @param Schedules $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Schedules $entity)
    {
        $form = $this->createForm(new SchedulesType(), $entity, array(
            'action' => $this->generateUrl('schedules_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Schedules entity.
     *
     * @Route("/new", name="schedules_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Schedules();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Schedules entity.
     *
     * @Route("/{id}", name="schedules_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ORFSStoreBundle:Schedules')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Schedules entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Schedules entity.
     *
     * @Route("/{id}/edit", name="schedules_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ORFSStoreBundle:Schedules')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Schedules entity.');
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
    * Creates a form to edit a Schedules entity.
    *
    * @param Schedules $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Schedules $entity)
    {
        $form = $this->createForm(new SchedulesType(), $entity, array(
            'action' => $this->generateUrl('schedules_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Schedules entity.
     *
     * @Route("/{id}", name="schedules_update")
     * @Method("PUT")
     * @Template("ORFSStoreBundle:Schedules:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ORFSStoreBundle:Schedules')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Schedules entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('schedules_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Schedules entity.
     *
     * @Route("/{id}", name="schedules_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ORFSStoreBundle:Schedules')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Schedules entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('schedules'));
    }

    /**
     * Creates a form to delete a Schedules entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('schedules_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
