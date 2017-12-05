<?php

namespace AppBundle\Controller;

use AppBundle\Entity\PeriodActivity;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Periodactivity controller.
 *
 * @Route("periodactivity")
 */
class PeriodActivityController extends Controller
{
    /**
     * Lists all periodActivity entities.
     *
     * @Route("/", name="periodactivity_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $months = array('01' => 'Enero', '02' => 'Febrero','03' => 'Marzo','04' => 'Abril',
        '05' => 'Mayo','06' => 'Junio' ,'07' => 'Julio' ,'08' => 'Agosto',
        '09' => 'Septiembre' ,'10'=> 'Octubre','11' => 'Noviembre','12' => 'Diciembre');
        $days = array(1 => 'Lunes', 2 => 'Martes',3 => 'Miércoles',4 => 'Jueves',
        5 => 'Viernes',6 => 'Sabado' ,7 => 'Domingo');

        //$periodActivities = $em->getRepository('AppBundle:PeriodActivity')->findAll();
        $periodActivities = $em->getRepository('AppBundle:PeriodActivity')->findBy([], ['startdate' => 'ASC','enddate' => 'ASC']);

        return $this->render('periodactivity/index.html.twig', array(
            'periodActivities' => $periodActivities,
            'months' => $months,
            'days' => $days,
            'breadcrumbs' => array(0 => array('title' => 'Calendario académico'))
        ));
    }

    /**
     * Lists for print all periodActivity entities.
     *
     * @Route("/print", name="periodactivity_print")
     * @Method("GET")
     */
    public function printAction()
    {
        $em = $this->getDoctrine()->getManager();
        $months = array('01' => 'Enero', '02' => 'Febrero','03' => 'Marzo','04' => 'Abril',
        '05' => 'Mayo','06' => 'Junio' ,'07' => 'Julio' ,'08' => 'Agosto',
        '09' => 'Septiembre' ,'10'=> 'Octubre','11' => 'Noviembre','12' => 'Diciembre');
        $days = array(1 => 'Lunes', 2 => 'Martes',3 => 'Miércoles',4 => 'Jueves',
        5 => 'Viernes',6 => 'Sabado' ,7 => 'Domingo');

        //$periodActivities = $em->getRepository('AppBundle:PeriodActivity')->findAll();
        $periodActivities = $em->getRepository('AppBundle:PeriodActivity')->findBy([], ['startdate' => 'ASC','enddate' => 'ASC']);

        return $this->render('periodactivity/print.html.twig', array(
            'periodActivities' => $periodActivities,
            'months' => $months,
            'days' => $days
        ));
    }

    /**
     * Lists for print all periodActivity entities, admin view
     *
     * @Route("/print/adm", name="periodactivity_printadm")
     * @Method("GET")
     */
    public function printAdmAction()
    {
        $em = $this->getDoctrine()->getManager();
        $months = array('01' => 'Enero', '02' => 'Febrero','03' => 'Marzo','04' => 'Abril',
        '05' => 'Mayo','06' => 'Junio' ,'07' => 'Julio' ,'08' => 'Agosto',
        '09' => 'Septiembre' ,'10'=> 'Octubre','11' => 'Noviembre','12' => 'Diciembre');
        $days = array(1 => 'Lunes', 2 => 'Martes',3 => 'Miércoles',4 => 'Jueves',
        5 => 'Viernes',6 => 'Sabado' ,7 => 'Domingo');

        //$periodActivities = $em->getRepository('AppBundle:PeriodActivity')->findAll();
        $periodActivities = $em->getRepository('AppBundle:PeriodActivity')->findBy([], ['startdate' => 'ASC','enddate' => 'ASC']);

        return $this->render('periodactivity/print-adm.html.twig', array(
            'periodActivities' => $periodActivities,
            'months' => $months,
            'days' => $days
        ));
    }

    /**
     * Creates a new periodActivity entity.
     *
     * @Route("/new", name="periodactivity_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $periodActivity = new Periodactivity();
        $form = $this->createForm('AppBundle\Form\PeriodActivityType', $periodActivity);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($periodActivity);
            $em->flush();

            return $this->redirectToRoute('periodactivity_show', array('id' => $periodActivity->getId()));
        }

        return $this->render('periodactivity/new.html.twig', array(
            'periodActivity' => $periodActivity,
            'form' => $form->createView(),
            'breadcrumbs' => array(
                0 => array('title' => 'Calendario académico', 'href' => $this->generateUrl('periodactivity_index')),
                1 => array('title' => 'Nueva')
            )
        ));
    }

    /**
     * Creates a new periodActivity entity from other
     *
     * @Route("/duplicate/{id}", name="periodactivity_duplicate")
     * @Method({"GET", "POST"})
     */
    public function duplicateAction(Request $request,PeriodActivity $base)
    {
        $periodActivity = new Periodactivity();
        $periodActivity->setStartdate($base->getStartdate());
        $periodActivity->setEnddate($base->getEnddate());
        $periodActivity->setDescription($base->getDescription());

        $form = $this->createForm('AppBundle\Form\PeriodActivityType', $periodActivity);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($periodActivity);
            $em->flush();

            return $this->redirectToRoute('periodactivity_show', array('id' => $periodActivity->getId()));
        }

        return $this->render('periodactivity/new.html.twig', array(
            'periodActivity' => $periodActivity,
            'form' => $form->createView(),
            'breadcrumbs' => array(
                0 => array('title' => 'Calendario académico', 'href' => $this->generateUrl('periodactivity_index')),
                1 => array('title' => 'Nueva')
            )
        ));
    }

    /**
     * Finds and displays a periodActivity entity.
     *
     * @Route("/{id}", name="periodactivity_show")
     * @Method("GET")
     */
    public function showAction(PeriodActivity $periodActivity)
    {
        $deleteForm = $this->createDeleteForm($periodActivity);

        return $this->render('periodactivity/show.html.twig', array(
            'periodActivity' => $periodActivity,
            'delete_form' => $deleteForm->createView(),
            'breadcrumbs' => array(
                0 => array('title' => 'Calendario académico', 'href' => $this->generateUrl('periodactivity_index')),
                1 => array('title' => 'Ver')
            )
        ));
    }

    /**
     * Displays a form to edit an existing periodActivity entity.
     *
     * @Route("/{id}/edit", name="periodactivity_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, PeriodActivity $periodActivity)
    {
        $deleteForm = $this->createDeleteForm($periodActivity);
        $editForm = $this->createForm('AppBundle\Form\PeriodActivityType', $periodActivity);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('periodactivity_edit', array('id' => $periodActivity->getId()));
        }

        return $this->render('periodactivity/edit.html.twig', array(
            'periodActivity' => $periodActivity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
            'breadcrumbs' => array(
                0 => array('title' => 'Calendario académico', 'href' => $this->generateUrl('periodactivity_index')),
                1 => array('title' => 'Editar')
            )
        ));
    }

    /**
     * Deletes a periodActivity entity.
     *
     * @Route("/{id}", name="periodactivity_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, PeriodActivity $periodActivity)
    {
        $form = $this->createDeleteForm($periodActivity);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($periodActivity);
            $em->flush();
        }

        return $this->redirectToRoute('periodactivity_index');
    }

    /**
     * Creates a form to delete a periodActivity entity.
     *
     * @param PeriodActivity $periodActivity The periodActivity entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(PeriodActivity $periodActivity)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('periodactivity_delete', array('id' => $periodActivity->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
