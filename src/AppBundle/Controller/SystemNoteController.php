<?php

namespace AppBundle\Controller;

use AppBundle\Entity\SystemNote;
use AppBundle\Entity\System;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Systemnote controller.
 *
 * @Route("systemnote")
 */
class SystemNoteController extends Controller
{
    /**
     * Lists all systemNote entities.
     *
     * @Route("/", name="systemnote_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $systemNotes = $em->getRepository('AppBundle:SystemNote')->findAll();

        return $this->render('systemnote/index.html.twig', array(
            'systemNotes' => $systemNotes,
        ));
    }

    /**
     * Creates a new systemNote entity.
     *
     * @Route("/new/{system}", name="systemnote_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request,System $system)
    {
        $systemNote = new Systemnote();
        $form = $this->createForm('AppBundle\Form\SystemNoteType', $systemNote);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($systemNote);
            $em->flush();

            return $this->redirectToRoute('systemnote_show', array('id' => $systemNote->getId()));
        }

        return $this->render('systemnote/new.html.twig', array(
            'systemNote' => $systemNote,
            'system' => $system,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a systemNote entity.
     *
     * @Route("/{id}", name="systemnote_show")
     * @Method("GET")
     */
    public function showAction(SystemNote $systemNote)
    {
        $deleteForm = $this->createDeleteForm($systemNote);

        return $this->render('systemnote/show.html.twig', array(
            'systemNote' => $systemNote,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing systemNote entity.
     *
     * @Route("/{id}/edit", name="systemnote_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, SystemNote $systemNote)
    {
        $deleteForm = $this->createDeleteForm($systemNote);
        $editForm = $this->createForm('AppBundle\Form\SystemNoteType', $systemNote);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('systemnote_edit', array('id' => $systemNote->getId()));
        }

        return $this->render('systemnote/edit.html.twig', array(
            'systemNote' => $systemNote,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a systemNote entity.
     *
     * @Route("/{id}", name="systemnote_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, SystemNote $systemNote)
    {
        $form = $this->createDeleteForm($systemNote);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($systemNote);
            $em->flush();
        }

        return $this->redirectToRoute('systemnote_index');
    }

    /**
     * Creates a form to delete a systemNote entity.
     *
     * @param SystemNote $systemNote The systemNote entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(SystemNote $systemNote)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('systemnote_delete', array('id' => $systemNote->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
