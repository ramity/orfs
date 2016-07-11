<?php

namespace ORFS\Bundle\StoreBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use ORFS\Bundle\StoreBundle\Entity\PaymentMethods;
use ORFS\Bundle\StoreBundle\Form\PaymentMethodsType;

/**
 * PaymentMethods controller.
 *
 * @Route("/paymentmethods")
 */
class PaymentMethodsController extends Controller
{

    /**
     * Lists all PaymentMethods entities.
     *
     * @Route("/", name="paymentmethods")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ORFSStoreBundle:PaymentMethods')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new PaymentMethods entity.
     *
     * @Route("/", name="paymentmethods_create")
     * @Method("POST")
     * @Template("ORFSStoreBundle:PaymentMethods:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new PaymentMethods();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('paymentmethods_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a PaymentMethods entity.
     *
     * @param PaymentMethods $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(PaymentMethods $entity)
    {
        $form = $this->createForm(new PaymentMethodsType(), $entity, array(
            'action' => $this->generateUrl('paymentmethods_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new PaymentMethods entity.
     *
     * @Route("/new", name="paymentmethods_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new PaymentMethods();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a PaymentMethods entity.
     *
     * @Route("/{id}", name="paymentmethods_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ORFSStoreBundle:PaymentMethods')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find PaymentMethods entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing PaymentMethods entity.
     *
     * @Route("/{id}/edit", name="paymentmethods_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ORFSStoreBundle:PaymentMethods')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find PaymentMethods entity.');
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
    * Creates a form to edit a PaymentMethods entity.
    *
    * @param PaymentMethods $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(PaymentMethods $entity)
    {
        $form = $this->createForm(new PaymentMethodsType(), $entity, array(
            'action' => $this->generateUrl('paymentmethods_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing PaymentMethods entity.
     *
     * @Route("/{id}", name="paymentmethods_update")
     * @Method("PUT")
     * @Template("ORFSStoreBundle:PaymentMethods:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ORFSStoreBundle:PaymentMethods')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find PaymentMethods entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('paymentmethods_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a PaymentMethods entity.
     *
     * @Route("/{id}", name="paymentmethods_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ORFSStoreBundle:PaymentMethods')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find PaymentMethods entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('paymentmethods'));
    }

    /**
     * Creates a form to delete a PaymentMethods entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('paymentmethods_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
