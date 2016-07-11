<?php

namespace ORFS\Bundle\StoreBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use ORFS\Bundle\StoreBundle\Entity\Services;
use ORFS\Bundle\StoreBundle\Form\ServicesType;

/**
 * Services controller.
 *
 * @Route("/services")
 */
class ServicesController extends Controller
{

    /**
     * Lists all Services entities.
     *
     * @Route("/", name="services")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ORFSStoreBundle:Services')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Services entity.
     *
     * @Route("/", name="services_create")
     * @Method("POST")
     * @Template("ORFSStoreBundle:Services:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Services();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('services_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Services entity.
     *
     * @param Services $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Services $entity)
    {
        $form = $this->createForm(new ServicesType(), $entity, array(
            'action' => $this->generateUrl('services_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Services entity.
     *
     * @Route("/new", name="services_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Services();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Services entity.
     *
     * @Route("/{id}", name="services_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ORFSStoreBundle:Services')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Services entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Services entity.
     *
     * @Route("/{id}/edit", name="services_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ORFSStoreBundle:Services')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Services entity.');
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
    * Creates a form to edit a Services entity.
    *
    * @param Services $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Services $entity)
    {
        $form = $this->createForm(new ServicesType(), $entity, array(
            'action' => $this->generateUrl('services_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Services entity.
     *
     * @Route("/{id}", name="services_update")
     * @Method("PUT")
     * @Template("ORFSStoreBundle:Services:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ORFSStoreBundle:Services')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Services entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('services_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Services entity.
     *
     * @Route("/{id}", name="services_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ORFSStoreBundle:Services')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Services entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('services'));
    }

    /**
     * Creates a form to delete a Services entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('services_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
