<?php

namespace AppBundle\Controller;

use AppBundle\Entity\ProccessRegulationArt;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Proccessregulationart controller.
 *
 * @Route("proccessregulationart")
 */
class ProccessRegulationArtController extends Controller
{
    /**
     * Lists all proccessRegulationArt entities.
     *
     * @Route("/", name="proccessregulationart_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $proccessRegulationArts = $em->getRepository('AppBundle:ProccessRegulationArt')->findAll();

        return $this->render('proccessregulationart/index.html.twig', array(
            'proccessRegulationArts' => $proccessRegulationArts,
        ));
    }

    /**
     * Creates a new proccessRegulationArt entity.
     *
     * @Route("/new", name="proccessregulationart_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $proccessRegulationArt = new Proccessregulationart();
        $form = $this->createForm('AppBundle\Form\ProccessRegulationArtType', $proccessRegulationArt);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($proccessRegulationArt);
            $em->flush();

            return $this->redirectToRoute('proccessregulationart_show', array('id' => $proccessRegulationArt->getId()));
        }

        return $this->render('proccessregulationart/new.html.twig', array(
            'proccessRegulationArt' => $proccessRegulationArt,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a proccessRegulationArt entity.
     *
     * @Route("/{id}", name="proccessregulationart_show")
     * @Method("GET")
     */
    public function showAction(ProccessRegulationArt $proccessRegulationArt)
    {
        $deleteForm = $this->createDeleteForm($proccessRegulationArt);

        return $this->render('proccessregulationart/show.html.twig', array(
            'proccessRegulationArt' => $proccessRegulationArt,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing proccessRegulationArt entity.
     *
     * @Route("/{id}/edit", name="proccessregulationart_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, ProccessRegulationArt $proccessRegulationArt)
    {
        $deleteForm = $this->createDeleteForm($proccessRegulationArt);
        $editForm = $this->createForm('AppBundle\Form\ProccessRegulationArtType', $proccessRegulationArt);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('proccessregulationart_edit', array('id' => $proccessRegulationArt->getId()));
        }

        return $this->render('proccessregulationart/edit.html.twig', array(
            'proccessRegulationArt' => $proccessRegulationArt,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a proccessRegulationArt entity.
     *
     * @Route("/{id}", name="proccessregulationart_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, ProccessRegulationArt $proccessRegulationArt)
    {
        $form = $this->createDeleteForm($proccessRegulationArt);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($proccessRegulationArt);
            $em->flush();
        }

        return $this->redirectToRoute('proccessregulationart_index');
    }

    /**
     * Creates a form to delete a proccessRegulationArt entity.
     *
     * @param ProccessRegulationArt $proccessRegulationArt The proccessRegulationArt entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ProccessRegulationArt $proccessRegulationArt)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('proccessregulationart_delete', array('id' => $proccessRegulationArt->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
