<?php

namespace AppBundle\Controller;

use AppBundle\Entity\System;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * System controller.
 *
 * @Route("system")
 */
class SystemController extends Controller
{
    /**
     * Lists all system entities.
     *
     * @Route("/", name="system_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $systems = $em->getRepository('AppBundle:System')->findAll();

        return $this->render('system/index.html.twig', array(
            'systems' => $systems,
            'breadcrumbs' => array(0 => array('title' => 'Sistemas de Información'))
        ));
    }

    /**
     * Creates a new system entity.
     *
     * @Route("/new", name="system_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $system = new System();
        $form = $this->createForm('AppBundle\Form\SystemType', $system);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($system);
            $em->flush();

            return $this->redirectToRoute('system_show', array('id' => $system->getId()));
        }

        return $this->render('system/new.html.twig', array(
            'system' => $system,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a system entity.
     *
     * @Route("/{id}", name="system_show")
     * @Method("GET")
     */
    public function showAction(System $system)
    {
        $deleteForm = $this->createDeleteForm($system);

        return $this->render('system/show.html.twig', array(
            'system' => $system,
            'delete_form' => $deleteForm->createView(),
            'breadcrumbs' => array(
                0 => array('title' => 'Sistema de Información', 'href' => $this->generateUrl('system_index')),
                1 => array('title' => $system->getName(), 'href' => $this->generateUrl('system_show', array('id' => $system->getId()))),
                2 => array('title' => 'Ver')
            )
        ));
    }

    /**
     * Displays a form to edit an existing system entity.
     *
     * @Route("/{id}/edit", name="system_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, System $system)
    {
        $deleteForm = $this->createDeleteForm($system);
        $editForm = $this->createForm('AppBundle\Form\SystemType', $system);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $system->setUpdatedAt(new \Datetime("now"));
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('system_edit', array('id' => $system->getId()));
        }

        return $this->render('system/edit.html.twig', array(
            'system' => $system,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
            'breadcrumbs' => array(
                0 => array('title' => 'Sistema de Información', 'href' => $this->generateUrl('system_index')),
                1 => array('title' => $system->getName(), 'href' => $this->generateUrl('system_show', array('id' => $system->getId()))),
                2 => array('title' => 'Editar')
            )
        ));
    }

    /**
     * Deletes a system entity.
     *
     * @Route("/{id}", name="system_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, System $system)
    {
        $form = $this->createDeleteForm($system);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($system);
            $em->flush();
        }

        return $this->redirectToRoute('system_index');
    }

    /**
     * Creates a form to delete a system entity.
     *
     * @param System $system The system entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(System $system)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('system_delete', array('id' => $system->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
