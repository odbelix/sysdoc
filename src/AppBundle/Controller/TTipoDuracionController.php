<?php

namespace AppBundle\Controller;

use AppBundle\Entity\TTipoDuracion;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Ttipoduracion controller.
 *
 * @Route("ttipoduracion")
 */
class TTipoDuracionController extends Controller
{
    /**
     * Lists all tTipoDuracion entities.
     *
     * @Route("/", name="ttipoduracion_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $tTipoDuracions = $em->getRepository('AppBundle:TTipoDuracion')->findAll();

        return $this->render('ttipoduracion/index.html.twig', array(
            'tTipoDuracions' => $tTipoDuracions,
        ));
    }

    /**
     * Creates a new tTipoDuracion entity.
     *
     * @Route("/new", name="ttipoduracion_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $tTipoDuracion = new Ttipoduracion();
        $form = $this->createForm('AppBundle\Form\TTipoDuracionType', $tTipoDuracion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($tTipoDuracion);
            $em->flush();

            return $this->redirectToRoute('ttipoduracion_show', array('ttd_codigo' => $tTipoDuracion->getTtdCodigo()));
        }

        return $this->render('ttipoduracion/new.html.twig', array(
            'tTipoDuracion' => $tTipoDuracion,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a tTipoDuracion entity.
     *
     * @Route("/{ttd_codigo}", name="ttipoduracion_show")
     * @Method("GET")
     */
    public function showAction(TTipoDuracion $tTipoDuracion)
    {
        $deleteForm = $this->createDeleteForm($tTipoDuracion);

        return $this->render('ttipoduracion/show.html.twig', array(
            'tTipoDuracion' => $tTipoDuracion,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing tTipoDuracion entity.
     *
     * @Route("/{ttd_codigo}/edit", name="ttipoduracion_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, TTipoDuracion $tTipoDuracion)
    {
        $deleteForm = $this->createDeleteForm($tTipoDuracion);
        $editForm = $this->createForm('AppBundle\Form\TTipoDuracionType', $tTipoDuracion);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('ttipoduracion_edit', array('ttd_codigo' => $tTipoDuracion->getTtdCodigo()));
        }

        return $this->render('ttipoduracion/edit.html.twig', array(
            'tTipoDuracion' => $tTipoDuracion,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a tTipoDuracion entity.
     *
     * @Route("/{ttd_codigo}", name="ttipoduracion_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, TTipoDuracion $tTipoDuracion)
    {
        $form = $this->createDeleteForm($tTipoDuracion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($tTipoDuracion);
            $em->flush();
        }

        return $this->redirectToRoute('ttipoduracion_index');
    }

    /**
     * Creates a form to delete a tTipoDuracion entity.
     *
     * @param TTipoDuracion $tTipoDuracion The tTipoDuracion entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(TTipoDuracion $tTipoDuracion)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('ttipoduracion_delete', array('ttd_codigo' => $tTipoDuracion->getTtdCodigo())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
