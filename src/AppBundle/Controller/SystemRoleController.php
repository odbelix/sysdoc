<?php

namespace AppBundle\Controller;

use AppBundle\Entity\SystemRole;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Systemrole controller.
 *
 * @Route("systemrole")
 */
class SystemRoleController extends Controller
{
    /**
     * Lists all systemRole entities.
     *
     * @Route("/", name="systemrole_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $systemRoles = $em->getRepository('AppBundle:SystemRole')->findAll();

        return $this->render('systemrole/index.html.twig', array(
            'systemRoles' => $systemRoles,
        ));
    }

    /**
     * Creates a new systemRole entity.
     *
     * @Route("/new", name="systemrole_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $systemRole = new Systemrole();
        $form = $this->createForm('AppBundle\Form\SystemRoleType', $systemRole);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($systemRole);
            $em->flush();

            return $this->redirectToRoute('systemrole_show', array('id' => $systemRole->getId()));
        }

        return $this->render('systemrole/new.html.twig', array(
            'systemRole' => $systemRole,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a systemRole entity.
     *
     * @Route("/{id}", name="systemrole_show")
     * @Method("GET")
     */
    public function showAction(SystemRole $systemRole)
    {
        $deleteForm = $this->createDeleteForm($systemRole);

        return $this->render('systemrole/show.html.twig', array(
            'systemRole' => $systemRole,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing systemRole entity.
     *
     * @Route("/{id}/edit", name="systemrole_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, SystemRole $systemRole)
    {
        $deleteForm = $this->createDeleteForm($systemRole);
        $editForm = $this->createForm('AppBundle\Form\SystemRoleType', $systemRole);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('systemrole_edit', array('id' => $systemRole->getId()));
        }

        return $this->render('systemrole/edit.html.twig', array(
            'systemRole' => $systemRole,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a systemRole entity.
     *
     * @Route("/{id}", name="systemrole_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, SystemRole $systemRole)
    {
        $form = $this->createDeleteForm($systemRole);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($systemRole);
            $em->flush();
        }

        return $this->redirectToRoute('systemrole_index');
    }

    /**
     * Creates a form to delete a systemRole entity.
     *
     * @param SystemRole $systemRole The systemRole entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(SystemRole $systemRole)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('systemrole_delete', array('id' => $systemRole->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
