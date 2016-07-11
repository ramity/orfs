<?php

namespace ORFS\Bundle\StoreBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use ORFS\Bundle\StoreBundle\Entity\Accounts;
use ORFS\Bundle\StoreBundle\Form\AccountsType;

/**
 * Accounts controller.
 *
 * @Route("/accounts")
 */
class AccountsController extends Controller
{

    /**
     * Lists all Accounts entities.
     *
     * @Route("/", name="accounts")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ORFSStoreBundle:Accounts')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Accounts entity.
     *
     * @Route("/", name="accounts_create")
     * @Method("POST")
     * @Template("ORFSStoreBundle:Accounts:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Accounts();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('accounts_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Accounts entity.
     *
     * @param Accounts $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Accounts $entity)
    {
        $form = $this->createForm(new AccountsType(), $entity, array(
            'action' => $this->generateUrl('accounts_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Accounts entity.
     *
     * @Route("/new", name="accounts_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Accounts();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Accounts entity.
     *
     * @Route("/{id}", name="accounts_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ORFSStoreBundle:Accounts')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Accounts entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Accounts entity.
     *
     * @Route("/{id}/edit", name="accounts_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ORFSStoreBundle:Accounts')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Accounts entity.');
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
    * Creates a form to edit a Accounts entity.
    *
    * @param Accounts $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Accounts $entity)
    {
        $form = $this->createForm(new AccountsType(), $entity, array(
            'action' => $this->generateUrl('accounts_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Accounts entity.
     *
     * @Route("/{id}", name="accounts_update")
     * @Method("PUT")
     * @Template("ORFSStoreBundle:Accounts:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ORFSStoreBundle:Accounts')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Accounts entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('accounts_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Accounts entity.
     *
     * @Route("/{id}", name="accounts_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ORFSStoreBundle:Accounts')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Accounts entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('accounts'));
    }

    /**
     * Creates a form to delete a Accounts entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('accounts_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
