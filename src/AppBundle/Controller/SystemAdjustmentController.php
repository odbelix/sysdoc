<?php

namespace AppBundle\Controller;

use AppBundle\Entity\SystemAdjustment;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Systemadjustment controller.
 *
 * @Route("systemadjustment")
 */
class SystemAdjustmentController extends Controller
{
    /**
     * Lists all systemAdjustment entities.
     *
     * @Route("/", name="systemadjustment_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $systemAdjustments = $em->getRepository('AppBundle:SystemAdjustment')->findAll();

        return $this->render('systemadjustment/index.html.twig', array(
            'systemAdjustments' => $systemAdjustments,
        ));
    }

    /**
     * Creates a new systemAdjustment entity.
     *
     * @Route("/new", name="systemadjustment_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $systemAdjustment = new Systemadjustment();
        $form = $this->createForm('AppBundle\Form\SystemAdjustmentType', $systemAdjustment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($systemAdjustment);
            $em->flush();

            return $this->redirectToRoute('systemadjustment_show', array('id' => $systemAdjustment->getId()));
        }

        return $this->render('systemadjustment/new.html.twig', array(
            'systemAdjustment' => $systemAdjustment,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a systemAdjustment entity.
     *
     * @Route("/{id}", name="systemadjustment_show")
     * @Method("GET")
     */
    public function showAction(SystemAdjustment $systemAdjustment)
    {
        $deleteForm = $this->createDeleteForm($systemAdjustment);

        return $this->render('systemadjustment/show.html.twig', array(
            'systemAdjustment' => $systemAdjustment,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing systemAdjustment entity.
     *
     * @Route("/{id}/edit", name="systemadjustment_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, SystemAdjustment $systemAdjustment)
    {
        $deleteForm = $this->createDeleteForm($systemAdjustment);
        $editForm = $this->createForm('AppBundle\Form\SystemAdjustmentType', $systemAdjustment);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('systemadjustment_edit', array('id' => $systemAdjustment->getId()));
        }

        return $this->render('systemadjustment/edit.html.twig', array(
            'systemAdjustment' => $systemAdjustment,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a systemAdjustment entity.
     *
     * @Route("/{id}", name="systemadjustment_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, SystemAdjustment $systemAdjustment)
    {
        $form = $this->createDeleteForm($systemAdjustment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($systemAdjustment);
            $em->flush();
        }

        return $this->redirectToRoute('systemadjustment_index');
    }

    /**
     * Creates a form to delete a systemAdjustment entity.
     *
     * @param SystemAdjustment $systemAdjustment The systemAdjustment entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(SystemAdjustment $systemAdjustment)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('systemadjustment_delete', array('id' => $systemAdjustment->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
