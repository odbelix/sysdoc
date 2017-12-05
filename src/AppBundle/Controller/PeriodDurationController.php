<?php

namespace AppBundle\Controller;

use AppBundle\Entity\PeriodDuration;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Periodduration controller.
 *
 * @Route("periodduration")
 */
class PeriodDurationController extends Controller
{
    /**
     * Lists all periodDuration entities.
     *
     * @Route("/", name="periodduration_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $periodDurations = $em->getRepository('AppBundle:PeriodDuration')->findAll();

        return $this->render('periodduration/index.html.twig', array(
            'periodDurations' => $periodDurations,
        ));
    }

    /**
     * Creates a new periodDuration entity.
     *
     * @Route("/new", name="periodduration_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $periodDuration = new Periodduration();
        $form = $this->createForm('AppBundle\Form\PeriodDurationType', $periodDuration);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($periodDuration);
            $em->flush();

            return $this->redirectToRoute('periodduration_show', array('id' => $periodDuration->getId()));
        }

        return $this->render('periodduration/new.html.twig', array(
            'periodDuration' => $periodDuration,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a periodDuration entity.
     *
     * @Route("/{id}", name="periodduration_show")
     * @Method("GET")
     */
    public function showAction(PeriodDuration $periodDuration)
    {
        $deleteForm = $this->createDeleteForm($periodDuration);

        return $this->render('periodduration/show.html.twig', array(
            'periodDuration' => $periodDuration,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing periodDuration entity.
     *
     * @Route("/{id}/edit", name="periodduration_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, PeriodDuration $periodDuration)
    {
        $deleteForm = $this->createDeleteForm($periodDuration);
        $editForm = $this->createForm('AppBundle\Form\PeriodDurationType', $periodDuration);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('periodduration_edit', array('id' => $periodDuration->getId()));
        }

        return $this->render('periodduration/edit.html.twig', array(
            'periodDuration' => $periodDuration,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a periodDuration entity.
     *
     * @Route("/{id}", name="periodduration_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, PeriodDuration $periodDuration)
    {
        $form = $this->createDeleteForm($periodDuration);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($periodDuration);
            $em->flush();
        }

        return $this->redirectToRoute('periodduration_index');
    }

    /**
     * Creates a form to delete a periodDuration entity.
     *
     * @param PeriodDuration $periodDuration The periodDuration entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(PeriodDuration $periodDuration)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('periodduration_delete', array('id' => $periodDuration->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
