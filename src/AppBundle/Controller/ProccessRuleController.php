<?php

namespace AppBundle\Controller;

use AppBundle\Entity\ProccessRule;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Proccessrule controller.
 *
 * @Route("proccessrule")
 */
class ProccessRuleController extends Controller
{
    /**
     * Lists all proccessRule entities.
     *
     * @Route("/", name="proccessrule_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $proccessRules = $em->getRepository('AppBundle:ProccessRule')->findAll();

        return $this->render('proccessrule/index.html.twig', array(
            'proccessRules' => $proccessRules,
        ));
    }

    /**
     * Creates a new proccessRule entity.
     *
     * @Route("/new", name="proccessrule_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $proccessRule = new Proccessrule();
        $form = $this->createForm('AppBundle\Form\ProccessRuleType', $proccessRule);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($proccessRule);
            $em->flush();

            return $this->redirectToRoute('proccessrule_show', array('id' => $proccessRule->getId()));
        }

        return $this->render('proccessrule/new.html.twig', array(
            'proccessRule' => $proccessRule,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a proccessRule entity.
     *
     * @Route("/{id}", name="proccessrule_show")
     * @Method("GET")
     */
    public function showAction(ProccessRule $proccessRule)
    {
        $deleteForm = $this->createDeleteForm($proccessRule);

        return $this->render('proccessrule/show.html.twig', array(
            'proccessRule' => $proccessRule,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing proccessRule entity.
     *
     * @Route("/{id}/edit", name="proccessrule_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, ProccessRule $proccessRule)
    {
        $deleteForm = $this->createDeleteForm($proccessRule);
        $editForm = $this->createForm('AppBundle\Form\ProccessRuleType', $proccessRule);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('proccessrule_edit', array('id' => $proccessRule->getId()));
        }

        return $this->render('proccessrule/edit.html.twig', array(
            'proccessRule' => $proccessRule,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a proccessRule entity.
     *
     * @Route("/{id}", name="proccessrule_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, ProccessRule $proccessRule)
    {
        $form = $this->createDeleteForm($proccessRule);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($proccessRule);
            $em->flush();
        }

        return $this->redirectToRoute('proccessrule_index');
    }

    /**
     * Creates a form to delete a proccessRule entity.
     *
     * @param ProccessRule $proccessRule The proccessRule entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ProccessRule $proccessRule)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('proccessrule_delete', array('id' => $proccessRule->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
