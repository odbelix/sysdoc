<?php

namespace AppBundle\Controller;

use AppBundle\Entity\MeetingAgreement;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Meetingagreement controller.
 *
 * @Route("meetingagreement")
 */
class MeetingAgreementController extends Controller
{
    /**
     * Lists all meetingAgreement entities.
     *
     * @Route("/", name="meetingagreement_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $meetingAgreements = $em->getRepository('AppBundle:MeetingAgreement')->findAll();

        return $this->render('meetingagreement/index.html.twig', array(
            'meetingAgreements' => $meetingAgreements,
        ));
    }

    /**
     * Creates a new meetingAgreement entity.
     *
     * @Route("/new", name="meetingagreement_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $meetingAgreement = new Meetingagreement();
        $form = $this->createForm('AppBundle\Form\MeetingAgreementType', $meetingAgreement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($meetingAgreement);
            $em->flush();

            return $this->redirectToRoute('meetingagreement_show', array('id' => $meetingAgreement->getId()));
        }

        return $this->render('meetingagreement/new.html.twig', array(
            'meetingAgreement' => $meetingAgreement,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a meetingAgreement entity.
     *
     * @Route("/{id}", name="meetingagreement_show")
     * @Method("GET")
     */
    public function showAction(MeetingAgreement $meetingAgreement)
    {
        $deleteForm = $this->createDeleteForm($meetingAgreement);

        return $this->render('meetingagreement/show.html.twig', array(
            'meetingAgreement' => $meetingAgreement,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing meetingAgreement entity.
     *
     * @Route("/{id}/edit", name="meetingagreement_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, MeetingAgreement $meetingAgreement)
    {
        $deleteForm = $this->createDeleteForm($meetingAgreement);
        $editForm = $this->createForm('AppBundle\Form\MeetingAgreementType', $meetingAgreement);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('meetingagreement_edit', array('id' => $meetingAgreement->getId()));
        }

        return $this->render('meetingagreement/edit.html.twig', array(
            'meetingAgreement' => $meetingAgreement,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a meetingAgreement entity.
     *
     * @Route("/{id}", name="meetingagreement_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, MeetingAgreement $meetingAgreement)
    {
        $form = $this->createDeleteForm($meetingAgreement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($meetingAgreement);
            $em->flush();
        }

        return $this->redirectToRoute('meetingagreement_index');
    }

    /**
     * Creates a form to delete a meetingAgreement entity.
     *
     * @param MeetingAgreement $meetingAgreement The meetingAgreement entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(MeetingAgreement $meetingAgreement)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('meetingagreement_delete', array('id' => $meetingAgreement->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
