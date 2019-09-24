<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Responsable;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Responsable controller.
 *
 * @Route("admin/responsable")
 */
class ResponsableController extends Controller
{
    /**
     * Lists all responsable entities.
     *
     * @Route("/", name="admin_responsable_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $responsables = $em->getRepository('AppBundle:Responsable')->findAll();

        return $this->render('responsable/index.html.twig', array(
            'responsables' => $responsables,
        ));
    }

    /**
     * Creates a new responsable entity.
     *
     * @Route("/new", name="admin_responsable_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $responsable = new Responsable();
        $form = $this->createForm('AppBundle\Form\ResponsableType', $responsable);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($responsable);
            $em->flush();

            return $this->redirectToRoute('admin_responsable_show', array('id' => $responsable->getId()));
        }

        return $this->render('responsable/new.html.twig', array(
            'responsable' => $responsable,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a responsable entity.
     *
     * @Route("/{id}", name="admin_responsable_show")
     * @Method("GET")
     */
    public function showAction(Responsable $responsable)
    {
        $deleteForm = $this->createDeleteForm($responsable);

        return $this->render('responsable/show.html.twig', array(
            'responsable' => $responsable,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing responsable entity.
     *
     * @Route("/{id}/edit", name="admin_responsable_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Responsable $responsable)
    {
        $deleteForm = $this->createDeleteForm($responsable);
        $editForm = $this->createForm('AppBundle\Form\ResponsableType', $responsable);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_responsable_edit', array('id' => $responsable->getId()));
        }

        return $this->render('responsable/edit.html.twig', array(
            'responsable' => $responsable,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a responsable entity.
     *
     * @Route("/{id}", name="admin_responsable_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Responsable $responsable)
    {
        $form = $this->createDeleteForm($responsable);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($responsable);
            $em->flush();
        }

        return $this->redirectToRoute('admin_responsable_index');
    }

    /**
     * Creates a form to delete a responsable entity.
     *
     * @param Responsable $responsable The responsable entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Responsable $responsable)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_responsable_delete', array('id' => $responsable->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
