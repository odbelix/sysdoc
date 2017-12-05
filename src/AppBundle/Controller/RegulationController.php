<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Regulation;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Regulation controller.
 *
 * @Route("regulation")
 */
class RegulationController extends Controller
{
    /**
     * Lists all regulation entities.
     *
     * @Route("/", name="regulation_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $regulations = $em->getRepository('AppBundle:Regulation')->findAll();

        return $this->render('regulation/index.html.twig', array(
            'regulations' => $regulations,
        ));
    }

    /**
     * Creates a new regulation entity.
     *
     * @Route("/new", name="regulation_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $regulation = new Regulation();
        $form = $this->createForm('AppBundle\Form\RegulationType', $regulation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($regulation);
            $em->flush();

            return $this->redirectToRoute('regulation_show', array('id' => $regulation->getId()));
        }

        return $this->render('regulation/new.html.twig', array(
            'regulation' => $regulation,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a regulation entity.
     *
     * @Route("/{id}", name="regulation_show")
     * @Method("GET")
     */
    public function showAction(Regulation $regulation)
    {
        $deleteForm = $this->createDeleteForm($regulation);

        return $this->render('regulation/show.html.twig', array(
            'regulation' => $regulation,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing regulation entity.
     *
     * @Route("/{id}/edit", name="regulation_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Regulation $regulation)
    {
        $deleteForm = $this->createDeleteForm($regulation);
        $editForm = $this->createForm('AppBundle\Form\RegulationType', $regulation);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $regulation->setUpdatedAt(new \Datetime("now"));
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('regulation_edit', array('id' => $regulation->getId()));
        }

        return $this->render('regulation/edit.html.twig', array(
            'regulation' => $regulation,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a regulation entity.
     *
     * @Route("/{id}", name="regulation_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Regulation $regulation)
    {
        $form = $this->createDeleteForm($regulation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($regulation);
            $em->flush();
        }

        return $this->redirectToRoute('regulation_index');
    }

    /**
     * Creates a form to delete a regulation entity.
     *
     * @param Regulation $regulation The regulation entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Regulation $regulation)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('regulation_delete', array('id' => $regulation->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
