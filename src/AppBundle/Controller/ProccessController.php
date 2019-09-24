<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Proccess;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Proccess controller.
 *
 * @Route("proccess")
 */
class ProccessController extends Controller
{
    /**
     * Lists all proccess entities.
     *
     * @Route("/", name="proccess_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $proccesses = $em->getRepository('AppBundle:Proccess')->findAll();

        return $this->render('proccess/index.html.twig', array(
            'proccesses' => $proccesses,
        ));
    }

    /**
     * Creates a new proccess entity.
     *
     * @Route("/new", name="proccess_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $proccess = new Proccess();
        $form = $this->createForm('AppBundle\Form\ProccessType', $proccess);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($proccess);
            $em->flush();

            return $this->redirectToRoute('proccess_show', array('id' => $proccess->getId()));
        }

        return $this->render('proccess/new.html.twig', array(
            'proccess' => $proccess,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a proccess entity.
     *
     * @Route("/{id}", name="proccess_show")
     * @Method("GET")
     */
    public function showAction(Proccess $proccess)
    {
        $deleteForm = $this->createDeleteForm($proccess);

        return $this->render('proccess/show.html.twig', array(
            'proccess' => $proccess,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing proccess entity.
     *
     * @Route("/{id}/edit", name="proccess_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Proccess $proccess)
    {
        $deleteForm = $this->createDeleteForm($proccess);
        $editForm = $this->createForm('AppBundle\Form\ProccessType', $proccess);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('proccess_edit', array('id' => $proccess->getId()));
        }

        return $this->render('proccess/edit.html.twig', array(
            'proccess' => $proccess,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a proccess entity.
     *
     * @Route("/{id}", name="proccess_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Proccess $proccess)
    {
        $form = $this->createDeleteForm($proccess);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($proccess);
            $em->flush();
        }

        return $this->redirectToRoute('proccess_index');
    }

    /**
     * Creates a form to delete a proccess entity.
     *
     * @param Proccess $proccess The proccess entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Proccess $proccess)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('proccess_delete', array('id' => $proccess->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
