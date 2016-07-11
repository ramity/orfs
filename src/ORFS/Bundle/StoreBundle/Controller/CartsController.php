<?php

namespace ORFS\Bundle\StoreBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use ORFS\Bundle\StoreBundle\Entity\Carts;
use ORFS\Bundle\StoreBundle\Form\CartsType;

/**
 * Carts controller.
 *
 * @Route("/carts")
 */
class CartsController extends Controller
{

    /**
     * Lists all Carts entities.
     *
     * @Route("/", name="carts")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ORFSStoreBundle:Carts')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Carts entity.
     *
     * @Route("/", name="carts_create")
     * @Method("POST")
     * @Template("ORFSStoreBundle:Carts:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Carts();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('carts_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Carts entity.
     *
     * @param Carts $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Carts $entity)
    {
        $form = $this->createForm(new CartsType(), $entity, array(
            'action' => $this->generateUrl('carts_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Carts entity.
     *
     * @Route("/new", name="carts_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Carts();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Carts entity.
     *
     * @Route("/{id}", name="carts_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ORFSStoreBundle:Carts')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Carts entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Carts entity.
     *
     * @Route("/{id}/edit", name="carts_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ORFSStoreBundle:Carts')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Carts entity.');
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
    * Creates a form to edit a Carts entity.
    *
    * @param Carts $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Carts $entity)
    {
        $form = $this->createForm(new CartsType(), $entity, array(
            'action' => $this->generateUrl('carts_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Carts entity.
     *
     * @Route("/{id}", name="carts_update")
     * @Method("PUT")
     * @Template("ORFSStoreBundle:Carts:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ORFSStoreBundle:Carts')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Carts entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('carts_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Carts entity.
     *
     * @Route("/{id}", name="carts_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ORFSStoreBundle:Carts')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Carts entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('carts'));
    }

    /**
     * Creates a form to delete a Carts entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('carts_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
