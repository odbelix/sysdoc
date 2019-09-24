<?php

namespace AppBundle\Controller;

use AppBundle\Entity\ProccessSystem;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Proccesssystem controller.
 *
 * @Route("proccesssystem")
 */
class ProccessSystemController extends Controller
{
    /**
     * Lists all proccessSystem entities.
     *
     * @Route("/", name="proccesssystem_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $proccessSystems = $em->getRepository('AppBundle:ProccessSystem')->findAll();

        return $this->render('proccesssystem/index.html.twig', array(
            'proccessSystems' => $proccessSystems,
        ));
    }

    /**
     * Creates a new proccessSystem entity.
     *
     * @Route("/new", name="proccesssystem_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $proccessSystem = new Proccesssystem();
        $form = $this->createForm('AppBundle\Form\ProccessSystemType', $proccessSystem);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($proccessSystem);
            $em->flush();

            return $this->redirectToRoute('proccesssystem_show', array('id' => $proccessSystem->getId()));
        }

        return $this->render('proccesssystem/new.html.twig', array(
            'proccessSystem' => $proccessSystem,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a proccessSystem entity.
     *
     * @Route("/{id}", name="proccesssystem_show")
     * @Method("GET")
     */
    public function showAction(ProccessSystem $proccessSystem)
    {
        $deleteForm = $this->createDeleteForm($proccessSystem);

        return $this->render('proccesssystem/show.html.twig', array(
            'proccessSystem' => $proccessSystem,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing proccessSystem entity.
     *
     * @Route("/{id}/edit", name="proccesssystem_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, ProccessSystem $proccessSystem)
    {
        $deleteForm = $this->createDeleteForm($proccessSystem);
        $editForm = $this->createForm('AppBundle\Form\ProccessSystemType', $proccessSystem);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('proccesssystem_edit', array('id' => $proccessSystem->getId()));
        }

        return $this->render('proccesssystem/edit.html.twig', array(
            'proccessSystem' => $proccessSystem,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a proccessSystem entity.
     *
     * @Route("/{id}", name="proccesssystem_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, ProccessSystem $proccessSystem)
    {
        $form = $this->createDeleteForm($proccessSystem);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($proccessSystem);
            $em->flush();
        }

        return $this->redirectToRoute('proccesssystem_index');
    }

    /**
     * Creates a form to delete a proccessSystem entity.
     *
     * @param ProccessSystem $proccessSystem The proccessSystem entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ProccessSystem $proccessSystem)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('proccesssystem_delete', array('id' => $proccessSystem->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
