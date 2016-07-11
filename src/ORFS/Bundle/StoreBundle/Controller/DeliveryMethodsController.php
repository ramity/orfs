<?php

namespace ORFS\Bundle\StoreBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use ORFS\Bundle\StoreBundle\Entity\DeliveryMethods;
use ORFS\Bundle\StoreBundle\Form\DeliveryMethodsType;

/**
 * DeliveryMethods controller.
 *
 * @Route("/deliverymethods")
 */
class DeliveryMethodsController extends Controller
{

    /**
     * Lists all DeliveryMethods entities.
     *
     * @Route("/", name="deliverymethods")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ORFSStoreBundle:DeliveryMethods')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new DeliveryMethods entity.
     *
     * @Route("/", name="deliverymethods_create")
     * @Method("POST")
     * @Template("ORFSStoreBundle:DeliveryMethods:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new DeliveryMethods();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('deliverymethods_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a DeliveryMethods entity.
     *
     * @param DeliveryMethods $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(DeliveryMethods $entity)
    {
        $form = $this->createForm(new DeliveryMethodsType(), $entity, array(
            'action' => $this->generateUrl('deliverymethods_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new DeliveryMethods entity.
     *
     * @Route("/new", name="deliverymethods_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new DeliveryMethods();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a DeliveryMethods entity.
     *
     * @Route("/{id}", name="deliverymethods_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ORFSStoreBundle:DeliveryMethods')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find DeliveryMethods entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing DeliveryMethods entity.
     *
     * @Route("/{id}/edit", name="deliverymethods_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ORFSStoreBundle:DeliveryMethods')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find DeliveryMethods entity.');
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
    * Creates a form to edit a DeliveryMethods entity.
    *
    * @param DeliveryMethods $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(DeliveryMethods $entity)
    {
        $form = $this->createForm(new DeliveryMethodsType(), $entity, array(
            'action' => $this->generateUrl('deliverymethods_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing DeliveryMethods entity.
     *
     * @Route("/{id}", name="deliverymethods_update")
     * @Method("PUT")
     * @Template("ORFSStoreBundle:DeliveryMethods:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ORFSStoreBundle:DeliveryMethods')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find DeliveryMethods entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('deliverymethods_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a DeliveryMethods entity.
     *
     * @Route("/{id}", name="deliverymethods_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ORFSStoreBundle:DeliveryMethods')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find DeliveryMethods entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('deliverymethods'));
    }

    /**
     * Creates a form to delete a DeliveryMethods entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('deliverymethods_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
