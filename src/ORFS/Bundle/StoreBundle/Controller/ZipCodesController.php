<?php

namespace ORFS\Bundle\StoreBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use ORFS\Bundle\StoreBundle\Entity\ZipCodes;
use ORFS\Bundle\StoreBundle\Form\ZipCodesType;

/**
 * ZipCodes controller.
 *
 * @Route("/zipcodes")
 */
class ZipCodesController extends Controller
{

    /**
     * Lists all ZipCodes entities.
     *
     * @Route("/", name="zipcodes")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ORFSStoreBundle:ZipCodes')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new ZipCodes entity.
     *
     * @Route("/", name="zipcodes_create")
     * @Method("POST")
     * @Template("ORFSStoreBundle:ZipCodes:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new ZipCodes();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('zipcodes_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a ZipCodes entity.
     *
     * @param ZipCodes $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(ZipCodes $entity)
    {
        $form = $this->createForm(new ZipCodesType(), $entity, array(
            'action' => $this->generateUrl('zipcodes_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new ZipCodes entity.
     *
     * @Route("/new", name="zipcodes_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new ZipCodes();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a ZipCodes entity.
     *
     * @Route("/{id}", name="zipcodes_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ORFSStoreBundle:ZipCodes')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ZipCodes entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing ZipCodes entity.
     *
     * @Route("/{id}/edit", name="zipcodes_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ORFSStoreBundle:ZipCodes')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ZipCodes entity.');
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
    * Creates a form to edit a ZipCodes entity.
    *
    * @param ZipCodes $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(ZipCodes $entity)
    {
        $form = $this->createForm(new ZipCodesType(), $entity, array(
            'action' => $this->generateUrl('zipcodes_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing ZipCodes entity.
     *
     * @Route("/{id}", name="zipcodes_update")
     * @Method("PUT")
     * @Template("ORFSStoreBundle:ZipCodes:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ORFSStoreBundle:ZipCodes')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ZipCodes entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('zipcodes_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a ZipCodes entity.
     *
     * @Route("/{id}", name="zipcodes_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ORFSStoreBundle:ZipCodes')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find ZipCodes entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('zipcodes'));
    }

    /**
     * Creates a form to delete a ZipCodes entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('zipcodes_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
