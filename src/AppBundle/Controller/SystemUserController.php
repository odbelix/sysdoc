<?php

namespace AppBundle\Controller;

use AppBundle\Entity\SystemUser;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Systemuser controller.
 *
 * @Route("systemuser")
 */
class SystemUserController extends Controller
{
    /**
     * Lists all systemUser entities.
     *
     * @Route("/", name="systemuser_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $systemUsers = $em->getRepository('AppBundle:SystemUser')->findAll();

        return $this->render('systemuser/index.html.twig', array(
            'systemUsers' => $systemUsers,
        ));
    }

    /**
     * Creates a new systemUser entity.
     *
     * @Route("/new", name="systemuser_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $systemUser = new Systemuser();
        $form = $this->createForm('AppBundle\Form\SystemUserType', $systemUser);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($systemUser);
            $em->flush();

            return $this->redirectToRoute('systemuser_show', array('id' => $systemUser->getId()));
        }

        return $this->render('systemuser/new.html.twig', array(
            'systemUser' => $systemUser,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a systemUser entity.
     *
     * @Route("/{id}", name="systemuser_show")
     * @Method("GET")
     */
    public function showAction(SystemUser $systemUser)
    {
        $deleteForm = $this->createDeleteForm($systemUser);

        return $this->render('systemuser/show.html.twig', array(
            'systemUser' => $systemUser,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing systemUser entity.
     *
     * @Route("/{id}/edit", name="systemuser_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, SystemUser $systemUser)
    {
        $deleteForm = $this->createDeleteForm($systemUser);
        $editForm = $this->createForm('AppBundle\Form\SystemUserType', $systemUser);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('systemuser_edit', array('id' => $systemUser->getId()));
        }

        return $this->render('systemuser/edit.html.twig', array(
            'systemUser' => $systemUser,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a systemUser entity.
     *
     * @Route("/{id}", name="systemuser_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, SystemUser $systemUser)
    {
        $form = $this->createDeleteForm($systemUser);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($systemUser);
            $em->flush();
        }

        return $this->redirectToRoute('systemuser_index');
    }

    /**
     * Creates a form to delete a systemUser entity.
     *
     * @param SystemUser $systemUser The systemUser entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(SystemUser $systemUser)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('systemuser_delete', array('id' => $systemUser->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
