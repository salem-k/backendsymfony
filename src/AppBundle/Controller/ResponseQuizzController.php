<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AppBundle\Entity\ResponseQuizz;
use AppBundle\Form\ResponseQuizzType;

/**
 * ResponseQuizz controller.
 *
 * @Route("/responsequizz")
 */
class ResponseQuizzController extends Controller
{

    /**
     * Lists all ResponseQuizz entities.
     *
     * @Route("/", name="responsequizz")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AppBundle:ResponseQuizz')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new ResponseQuizz entity.
     *
     * @Route("/", name="responsequizz_create")
     * @Method("POST")
     * @Template("AppBundle:ResponseQuizz:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new ResponseQuizz();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('responsequizz_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a ResponseQuizz entity.
     *
     * @param ResponseQuizz $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(ResponseQuizz $entity)
    {
        $form = $this->createForm(new ResponseQuizzType(), $entity, array(
            'action' => $this->generateUrl('responsequizz_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new ResponseQuizz entity.
     *
     * @Route("/new", name="responsequizz_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new ResponseQuizz();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a ResponseQuizz entity.
     *
     * @Route("/{id}", name="responsequizz_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:ResponseQuizz')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ResponseQuizz entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing ResponseQuizz entity.
     *
     * @Route("/{id}/edit", name="responsequizz_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:ResponseQuizz')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ResponseQuizz entity.');
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
    * Creates a form to edit a ResponseQuizz entity.
    *
    * @param ResponseQuizz $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(ResponseQuizz $entity)
    {
        $form = $this->createForm(new ResponseQuizzType(), $entity, array(
            'action' => $this->generateUrl('responsequizz_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing ResponseQuizz entity.
     *
     * @Route("/{id}", name="responsequizz_update")
     * @Method("PUT")
     * @Template("AppBundle:ResponseQuizz:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:ResponseQuizz')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ResponseQuizz entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('responsequizz_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a ResponseQuizz entity.
     *
     * @Route("/{id}", name="responsequizz_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AppBundle:ResponseQuizz')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find ResponseQuizz entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('responsequizz'));
    }

    /**
     * Creates a form to delete a ResponseQuizz entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('responsequizz_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
