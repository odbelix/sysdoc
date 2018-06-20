<?php

namespace AppBundle\Controller;

use AppBundle\Entity\PeriodActivity;
use AppBundle\Entity\PeriodCalendar;
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
     * @Route("/{id}", name="periodactivity_index")
     * @Method("GET")
     */
    public function indexAction(Request $request,PeriodCalendar $calendar)
    {
        $em = $this->getDoctrine()->getManager();
        $months = array('01' => 'Enero', '02' => 'Febrero','03' => 'Marzo','04' => 'Abril',
        '05' => 'Mayo','06' => 'Junio' ,'07' => 'Julio' ,'08' => 'Agosto',
        '09' => 'Septiembre' ,'10'=> 'Octubre','11' => 'Noviembre','12' => 'Diciembre');
        $days = array(1 => 'Lunes', 2 => 'Martes',3 => 'Miércoles',4 => 'Jueves',
        5 => 'Viernes',6 => 'Sabado' ,7 => 'Domingo');

        //$periodActivities = $em->getRepository('AppBundle:PeriodActivity')->findAll();
        //$periodActivities = $em->getRepository('AppBundle:PeriodActivity')->findBy(['period_calendar_id' => $calendar->getId()], ['startdate' => 'ASC','enddate' => 'ASC']);
        $periodActivities = $em->getRepository('AppBundle:PeriodActivity')->findBy(['period_calendar_id' => $calendar->getId()], ['startdate' => 'ASC']);


        return $this->render('periodactivity/index.html.twig', array(
            'periodActivities' => $periodActivities,
            'months' => $months,
            'days' => $days,
            'calendar' => $calendar,
            'breadcrumbs' => array(0 => array('title' => 'Calendario académico'))
        ));
    }

    /**
     * Lists for print all periodActivity entities.
     *
     * @Route("/print/{id}", name="periodactivity_print")
     * @Method("GET")
     */
    public function printAction(Request $request,PeriodCalendar $calendar)
    {
        $em = $this->getDoctrine()->getManager();
        $months = array('01' => 'Enero', '02' => 'Febrero','03' => 'Marzo','04' => 'Abril',
        '05' => 'Mayo','06' => 'Junio' ,'07' => 'Julio' ,'08' => 'Agosto',
        '09' => 'Septiembre' ,'10'=> 'Octubre','11' => 'Noviembre','12' => 'Diciembre');
        $days = array(1 => 'Lunes', 2 => 'Martes',3 => 'Miércoles',4 => 'Jueves',
        5 => 'Viernes',6 => 'Sabado' ,7 => 'Domingo');

        //$periodActivities = $em->getRepository('AppBundle:PeriodActivity')->findAll();
        //$periodActivities = $em->getRepository('AppBundle:PeriodActivity')->findBy([], ['startdate' => 'ASC','enddate' => 'ASC']);
        $periodActivities = $em->getRepository('AppBundle:PeriodActivity')->findBy(['period_calendar_id' => $calendar->getId()], ['startdate' => 'ASC']);

        return $this->render('periodactivity/print.html.twig', array(
            'periodActivities' => $periodActivities,
            'months' => $months,
            'days' => $days
        ));
    }

    /**
     * Lists for print all periodActivity entities, admin view
     *
     * @Route("/print/adm/{id}", name="periodactivity_printadm")
     * @Method("GET")
     */
    public function printAdmAction(Request $request,PeriodCalendar $calendar)
    {
        $em = $this->getDoctrine()->getManager();
        $months = array('01' => 'Enero', '02' => 'Febrero','03' => 'Marzo','04' => 'Abril',
        '05' => 'Mayo','06' => 'Junio' ,'07' => 'Julio' ,'08' => 'Agosto',
        '09' => 'Septiembre' ,'10'=> 'Octubre','11' => 'Noviembre','12' => 'Diciembre');
        $days = array(1 => 'Lunes', 2 => 'Martes',3 => 'Miércoles',4 => 'Jueves',
        5 => 'Viernes',6 => 'Sabado' ,7 => 'Domingo');

        //$periodActivities = $em->getRepository('AppBundle:PeriodActivity')->findAll();
        //$periodActivities = $em->getRepository('AppBundle:PeriodActivity')->findBy([], ['startdate' => 'ASC','enddate' => 'ASC']);
        $periodActivities = $em->getRepository('AppBundle:PeriodActivity')->findBy(['period_calendar_id' => $calendar->getId()], ['startdate' => 'ASC']);

        return $this->render('periodactivity/print-adm.html.twig', array(
            'periodActivities' => $periodActivities,
            'months' => $months,
            'days' => $days
        ));
    }

    /**
     * Lists for print all periodActivity entities.
     *
     * @Route("/print/calendar/{id}", name="periodactivity_print_calendar")
     * @Method("GET")
     */
    public function printCalendarAction(Request $request,PeriodCalendar $calendar)
    {
        $em = $this->getDoctrine()->getManager();
        $months = array('01' => 'Enero', '02' => 'Febrero','03' => 'Marzo','04' => 'Abril',
        '05' => 'Mayo','06' => 'Junio' ,'07' => 'Julio' ,'08' => 'Agosto',
        '09' => 'Septiembre' ,'10'=> 'Octubre','11' => 'Noviembre','12' => 'Diciembre');
        $days = array(1 => 'Lunes', 2 => 'Martes',3 => 'Miércoles',4 => 'Jueves',
        5 => 'Viernes',6 => 'Sabado' ,7 => 'Domingo');

        //$periodActivities = $em->getRepository('AppBundle:PeriodActivity')->findAll();
        //$periodActivities = $em->getRepository('AppBundle:PeriodActivity')->findBy([], ['startdate' => 'ASC','enddate' => 'ASC']);
        $periodActivitiesStart = $em->getRepository('AppBundle:PeriodActivity')->findBy(['period_calendar_id' => $calendar->getId()], ['startdate' => 'ASC']);
        $periodActivitiesEnd = $em->getRepository('AppBundle:PeriodActivity')->findBy(['period_calendar_id' => $calendar->getId()], ['startdate' => 'DESC']);
        $periodActivities = $em->getRepository('AppBundle:PeriodActivity')->findBy(['period_calendar_id' => $calendar->getId()], ['startdate' => 'ASC']);
        $start = $periodActivitiesStart[0]->getStartdate();
        $end = $periodActivitiesEnd[0]->getStartdate();

        $output = array();
        $logger = $this->get('logger');
        $temp = clone $start;
        while ( $temp <= $end) {
            $data = array();
            $data['date'] = new \DateTime();
            $data['date'] = clone $temp;
            $activities = array();
            foreach ($periodActivities as $activity) {
                //Check if is one date
                if ( $activity->getEndDate() ==  null) {
                    if ($temp->format('Y-m-d') == $activity->getStartDate()->format('Y-m-d')){
                        $logger->info($temp->format('Y-m-d H:i:s').' == '.$activity->getStartDate()->format('Y-m-d H:i:s'));
                        $activities[] = $activity;
                    }
                }
                else {
                    $diff = date_diff($activity->getEndDate(),$activity->getStartDate());
                    if ($temp->format('Y-m-d') >= $activity->getStartDate()->format('Y-m-d')
                        && $temp->format('Y-m-d') <= $activity->getEndDate()->format('Y-m-d')
                         && $diff->d < 15
                    ){
                        $logger->info($temp->format('Y-m-d H:i:s').' == '.$activity->getStartDate()->format('Y-m-d H:i:s'));
                        $activities[] = $activity;
                    }
                }
            }
            $logger->info(count($activities));
            if ( count($activities) != 0 )
                $data['objects'] = $activities;
            else
                $data['objects'] = null;

            $output[] = $data;
            $temp = $temp->modify('+1 day');
        }

        return $this->render('periodactivity/print-calendar.html.twig', array(
            'periodActivities' => $periodActivities,
            'schedule' => $output,
            'startdate' => $start,
            'enddate' => $end,
            'months' => $months,
            'days' => $days
        ));
    }


    /**
     * Creates a new periodActivity entity.
     *
     * @Route("/new/{id}", name="periodactivity_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request,PeriodCalendar $calendar)
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
            'calendar' => $calendar,
            'breadcrumbs' => array(
                0 => array('title' => 'Calendario académico', 'href' => $this->generateUrl('periodactivity_index',array('id' => $calendar->getId()) )),
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

        $calendar = new PeriodCalendar();
        $calendar = $base->getPeriodCalendar();

        $form = $this->createForm('AppBundle\Form\PeriodActivityType', $periodActivity);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($periodActivity);
            $em->flush();

            //return $this->redirectToRoute('periodactivity_show', array('id' => $periodActivity->getId()));
        }

        return $this->render('periodactivity/new.html.twig', array(
            'periodActivity' => $periodActivity,
            'form' => $form->createView(),
            'calendar' => $calendar,
            'breadcrumbs' => array(
                0 => array('title' => 'Calendario académico', 'href' => $this->generateUrl('periodactivity_index',array('id' => $calendar->getId() ))),
                1 => array('title' => 'Nueva')
            )
        ));
    }

    /**
     * Finds and displays a periodActivity entity.
     *
     * @Route("/show/{id}", name="periodactivity_show")
     * @Method("GET")
     */
    public function showAction(PeriodActivity $periodActivity)
    {
        $deleteForm = $this->createDeleteForm($periodActivity);
        $calendar = new PeriodCalendar();
        $calendar = $periodActivity->getPeriodCalendar();

        return $this->render('periodactivity/show.html.twig', array(
            'periodActivity' => $periodActivity,
            'delete_form' => $deleteForm->createView(),
            'calendar' => $calendar,
            'breadcrumbs' => array(
                0 => array('title' => 'Calendario académico', 'href' => $this->generateUrl('periodactivity_index', array('id' => $calendar->getId() ))),
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

        $calendar = new PeriodCalendar();
        $calendar = $periodActivity->getPeriodCalendar();

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('periodactivity_edit', array('id' => $periodActivity->getId()));
        }

        return $this->render('periodactivity/edit.html.twig', array(
            'periodActivity' => $periodActivity,
            'calendar' => $calendar,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
            'breadcrumbs' => array(
                0 => array('title' => 'Calendario académico', 'href' => $this->generateUrl('periodactivity_index',array('id' => $calendar->getId()))),
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

        $id = $periodActivity->getPeriodCalendarId();

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($periodActivity);
            $em->flush();
        }

        return $this->redirectToRoute('periodactivity_index',array('id' => $id ));
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
