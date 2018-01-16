<?php

namespace AppBundle\Controller;

use AppBundle\Entity\MeetingNote;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Meetingnote controller.
 *
 * @Route("meetingnote")
 */
class MeetingNoteController extends Controller
{
    /**
     * Lists all meetingNote entities.
     *
     * @Route("/", name="meetingnote_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $meetingNotes = $em->getRepository('AppBundle:MeetingNote')->findAll();

        return $this->render('meetingnote/index.html.twig', array(
            'meetingNotes' => $meetingNotes,
        ));
    }

    /**
     * Creates a new meetingNote entity.
     *
     * @Route("/new", name="meetingnote_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $meetingNote = new Meetingnote();
        $form = $this->createForm('AppBundle\Form\MeetingNoteType', $meetingNote);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($meetingNote);
            $em->flush();

            return $this->redirectToRoute('meetingnote_show', array('id' => $meetingNote->getId()));
        }

        return $this->render('meetingnote/new.html.twig', array(
            'meetingNote' => $meetingNote,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a meetingNote entity.
     *
     * @Route("/{id}", name="meetingnote_show")
     * @Method("GET")
     */
    public function showAction(MeetingNote $meetingNote)
    {
        $deleteForm = $this->createDeleteForm($meetingNote);

        return $this->render('meetingnote/show.html.twig', array(
            'meetingNote' => $meetingNote,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing meetingNote entity.
     *
     * @Route("/{id}/edit", name="meetingnote_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, MeetingNote $meetingNote)
    {
        $deleteForm = $this->createDeleteForm($meetingNote);
        $editForm = $this->createForm('AppBundle\Form\MeetingNoteType', $meetingNote);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('meetingnote_edit', array('id' => $meetingNote->getId()));
        }

        return $this->render('meetingnote/edit.html.twig', array(
            'meetingNote' => $meetingNote,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a meetingNote entity.
     *
     * @Route("/{id}", name="meetingnote_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, MeetingNote $meetingNote)
    {
        $form = $this->createDeleteForm($meetingNote);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($meetingNote);
            $em->flush();
        }

        return $this->redirectToRoute('meetingnote_index');
    }

    /**
     * Creates a form to delete a meetingNote entity.
     *
     * @param MeetingNote $meetingNote The meetingNote entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(MeetingNote $meetingNote)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('meetingnote_delete', array('id' => $meetingNote->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
