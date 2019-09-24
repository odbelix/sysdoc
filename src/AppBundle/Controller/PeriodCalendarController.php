<?php

namespace AppBundle\Controller;

use AppBundle\Entity\PeriodCalendar;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Periodcalendar controller.
 *
 * @Route("periodcalendar")
 */
class PeriodCalendarController extends Controller
{
    /**
     * Lists all periodCalendar entities.
     *
     * @Route("/", name="periodcalendar_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $periodCalendars = $em->getRepository('AppBundle:PeriodCalendar')->findAll();

        return $this->render('periodcalendar/index.html.twig', array(
            'periodCalendars' => $periodCalendars,
            'breadcrumbs' => array(0 => array('title' => 'Gestión de Calendarios académicos'))
        ));
    }

    /**
     * Creates a new periodCalendar entity.
     *
     * @Route("/new", name="periodcalendar_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $periodCalendar = new Periodcalendar();
        $form = $this->createForm('AppBundle\Form\PeriodCalendarType', $periodCalendar);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($periodCalendar);
            $em->flush();

            return $this->redirectToRoute('periodcalendar_show', array('id' => $periodCalendar->getId()));
        }

        return $this->render('periodcalendar/new.html.twig', array(
            'periodCalendar' => $periodCalendar,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a periodCalendar entity.
     *
     * @Route("/{id}", name="periodcalendar_show")
     * @Method("GET")
     */
    public function showAction(PeriodCalendar $periodCalendar)
    {
        $deleteForm = $this->createDeleteForm($periodCalendar);

        return $this->render('periodcalendar/show.html.twig', array(
            'periodCalendar' => $periodCalendar,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing periodCalendar entity.
     *
     * @Route("/{id}/edit", name="periodcalendar_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, PeriodCalendar $periodCalendar)
    {
        $deleteForm = $this->createDeleteForm($periodCalendar);
        $editForm = $this->createForm('AppBundle\Form\PeriodCalendarType', $periodCalendar);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('periodcalendar_edit', array('id' => $periodCalendar->getId()));
        }

        return $this->render('periodcalendar/edit.html.twig', array(
            'periodCalendar' => $periodCalendar,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a periodCalendar entity.
     *
     * @Route("/{id}", name="periodcalendar_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, PeriodCalendar $periodCalendar)
    {
        $form = $this->createDeleteForm($periodCalendar);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($periodCalendar);
            $em->flush();
        }

        return $this->redirectToRoute('periodcalendar_index');
    }

    /**
     * Creates a form to delete a periodCalendar entity.
     *
     * @param PeriodCalendar $periodCalendar The periodCalendar entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(PeriodCalendar $periodCalendar)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('periodcalendar_delete', array('id' => $periodCalendar->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
