<?php

namespace AppBundle\Controller;

use AppBundle\Entity\RegulationArt;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Regulationart controller.
 *
 * @Route("regulationart")
 */
class RegulationArtController extends Controller
{
    /**
     * Lists all regulationArt entities.
     *
     * @Route("/", name="regulationart_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $regulationArts = $em->getRepository('AppBundle:RegulationArt')->findAll();

        return $this->render('regulationart/index.html.twig', array(
            'regulationArts' => $regulationArts,
            'breadcrumbs' => array(0 => array('title' => 'Artículos de los Reglamentos'))
        ));
    }

    /**
     * Creates a new regulationArt entity.
     *
     * @Route("/new", name="regulationart_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $regulationArt = new Regulationart();
        $form = $this->createForm('AppBundle\Form\RegulationArtType', $regulationArt);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $regulationArt->setCreatedAt(new \Datetime("now"));
            $em->persist($regulationArt);
            $em->flush();

            return $this->redirectToRoute('regulationart_show', array('id' => $regulationArt->getId()));
        }

        return $this->render('regulationart/new.html.twig', array(
            'regulationArt' => $regulationArt,
            'form' => $form->createView(),
            'breadcrumbs' => array(0 => array('title' => 'Artículos de los Reglamentos','href' => $this->generateUrl('regulationart_index')),
                            1 => array('title' => 'Nuevo Artículo'))
        ));
    }

    /**
     * Finds and displays a regulationArt entity.
     *
     * @Route("/{id}", name="regulationart_show")
     * @Method("GET")
     */
    public function showAction(RegulationArt $regulationArt)
    {
        $deleteForm = $this->createDeleteForm($regulationArt);

        return $this->render('regulationart/show.html.twig', array(
            'regulationArt' => $regulationArt,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing regulationArt entity.
     *
     * @Route("/{id}/edit", name="regulationart_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, RegulationArt $regulationArt)
    {
        $deleteForm = $this->createDeleteForm($regulationArt);
        $editForm = $this->createForm('AppBundle\Form\RegulationArtType', $regulationArt);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('regulationart_edit', array('id' => $regulationArt->getId()));
        }

        return $this->render('regulationart/edit.html.twig', array(
            'regulationArt' => $regulationArt,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a regulationArt entity.
     *
     * @Route("/{id}", name="regulationart_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, RegulationArt $regulationArt)
    {
        $form = $this->createDeleteForm($regulationArt);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($regulationArt);
            $em->flush();
        }

        return $this->redirectToRoute('regulationart_index');
    }

    /**
     * Creates a form to delete a regulationArt entity.
     *
     * @param RegulationArt $regulationArt The regulationArt entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(RegulationArt $regulationArt)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('regulationart_delete', array('id' => $regulationArt->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
