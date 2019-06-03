<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AppBundle\Entity\PeriodActivity
 *
 * @ORM\Entity()
 * @ORM\Table(name="period_activity", indexes={@ORM\Index(name="fk_activity_duration1_idx", columns={"duration_id"}), @ORM\Index(name="fk_period_activity_period_calendar1_idx", columns={"period_calendar_id"}), @ORM\Index(name="fk_period_activity_t_tipo_duracion1_idx", columns={"ttd_codigo"}), @ORM\Index(name="fk_period_activity_proccess1_idx", columns={"proccess_id"}), @ORM\Index(name="fk_period_activity_unit1_idx", columns={"unit_id"})})
 */
class PeriodActivity
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $startdate;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $enddate;

    /**
     * @ORM\Column(type="text")
     */
    protected $description;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $duration_id;

    /**
     * @ORM\Column(name="`position`", type="integer", nullable=true)
     */
    protected $position;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $period_calendar_id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $ttd_codigo;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $proccess_id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $unit_id;

    /**
     * @ORM\Column(name="`year`", type="integer", nullable=true)
     */
    protected $year;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $period;

    /**
     * @ORM\ManyToOne(targetEntity="PeriodDuration", inversedBy="periodActivities")
     * @ORM\JoinColumn(name="duration_id", referencedColumnName="id")
     */
    protected $periodDuration;

    /**
     * @ORM\ManyToOne(targetEntity="PeriodCalendar", inversedBy="periodActivities")
     * @ORM\JoinColumn(name="period_calendar_id", referencedColumnName="id")
     */
    protected $periodCalendar;

    /**
     * @ORM\ManyToOne(targetEntity="TTipoDuracion", inversedBy="periodActivities")
     * @ORM\JoinColumn(name="ttd_codigo", referencedColumnName="ttd_codigo")
     */
    protected $tTipoDuracion;

    /**
     * @ORM\ManyToOne(targetEntity="Proccess", inversedBy="periodActivities")
     * @ORM\JoinColumn(name="proccess_id", referencedColumnName="id")
     */
    protected $proccess;

    /**
     * @ORM\ManyToOne(targetEntity="Unit", inversedBy="periodActivities")
     * @ORM\JoinColumn(name="unit_id", referencedColumnName="id")
     */
    protected $unit;

    public function __construct()
    {
    }

    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \AppBundle\Entity\PeriodActivity
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of id.
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of startdate.
     *
     * @param \DateTime $startdate
     * @return \AppBundle\Entity\PeriodActivity
     */
    public function setStartdate($startdate)
    {
        $this->startdate = $startdate;

        return $this;
    }

    /**
     * Get the value of startdate.
     *
     * @return \DateTime
     */
    public function getStartdate()
    {
        return $this->startdate;
    }

    /**
     * Set the value of enddate.
     *
     * @param \DateTime $enddate
     * @return \AppBundle\Entity\PeriodActivity
     */
    public function setEnddate($enddate)
    {
        $this->enddate = $enddate;

        return $this;
    }

    /**
     * Get the value of enddate.
     *
     * @return \DateTime
     */
    public function getEnddate()
    {
        return $this->enddate;
    }

    /**
     * Set the value of description.
     *
     * @param string $description
     * @return \AppBundle\Entity\PeriodActivity
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of description.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of duration_id.
     *
     * @param integer $duration_id
     * @return \AppBundle\Entity\PeriodActivity
     */
    public function setDurationId($duration_id)
    {
        $this->duration_id = $duration_id;

        return $this;
    }

    /**
     * Get the value of duration_id.
     *
     * @return integer
     */
    public function getDurationId()
    {
        return $this->duration_id;
    }

    /**
     * Set the value of position.
     *
     * @param integer $position
     * @return \AppBundle\Entity\PeriodActivity
     */
    public function setPosition($position)
    {
        $this->position = $position;

        return $this;
    }

    /**
     * Get the value of position.
     *
     * @return integer
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Set the value of period_calendar_id.
     *
     * @param integer $period_calendar_id
     * @return \AppBundle\Entity\PeriodActivity
     */
    public function setPeriodCalendarId($period_calendar_id)
    {
        $this->period_calendar_id = $period_calendar_id;

        return $this;
    }

    /**
     * Get the value of period_calendar_id.
     *
     * @return integer
     */
    public function getPeriodCalendarId()
    {
        return $this->period_calendar_id;
    }

    /**
     * Set the value of ttd_codigo.
     *
     * @param integer $ttd_codigo
     * @return \AppBundle\Entity\PeriodActivity
     */
    public function setTtdCodigo($ttd_codigo)
    {
        $this->ttd_codigo = $ttd_codigo;

        return $this;
    }

    /**
     * Get the value of ttd_codigo.
     *
     * @return integer
     */
    public function getTtdCodigo()
    {
        return $this->ttd_codigo;
    }

    /**
     * Set the value of proccess_id.
     *
     * @param integer $proccess_id
     * @return \AppBundle\Entity\PeriodActivity
     */
    public function setProccessId($proccess_id)
    {
        $this->proccess_id = $proccess_id;

        return $this;
    }

    /**
     * Get the value of proccess_id.
     *
     * @return integer
     */
    public function getProccessId()
    {
        return $this->proccess_id;
    }

    /**
     * Set the value of unit_id.
     *
     * @param integer $unit_id
     * @return \AppBundle\Entity\PeriodActivity
     */
    public function setUnitId($unit_id)
    {
        $this->unit_id = $unit_id;

        return $this;
    }

    /**
     * Get the value of unit_id.
     *
     * @return integer
     */
    public function getUnitId()
    {
        return $this->unit_id;
    }

    /**
     * Set the value of year.
     *
     * @param integer $year
     * @return \AppBundle\Entity\PeriodActivity
     */
    public function setYear($year)
    {
        $this->year = $year;

        return $this;
    }

    /**
     * Get the value of year.
     *
     * @return integer
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * Set the value of period.
     *
     * @param integer $period
     * @return \AppBundle\Entity\PeriodActivity
     */
    public function setPeriod($period)
    {
        $this->period = $period;

        return $this;
    }

    /**
     * Get the value of period.
     *
     * @return integer
     */
    public function getPeriod()
    {
        return $this->period;
    }

    /**
     * Set PeriodDuration entity (many to one).
     *
     * @param \AppBundle\Entity\PeriodDuration $periodDuration
     * @return \AppBundle\Entity\PeriodActivity
     */
    public function setPeriodDuration(PeriodDuration $periodDuration = null)
    {
        $this->periodDuration = $periodDuration;

        return $this;
    }

    /**
     * Get PeriodDuration entity (many to one).
     *
     * @return \AppBundle\Entity\PeriodDuration
     */
    public function getPeriodDuration()
    {
        return $this->periodDuration;
    }

    /**
     * Set PeriodCalendar entity (many to one).
     *
     * @param \AppBundle\Entity\PeriodCalendar $periodCalendar
     * @return \AppBundle\Entity\PeriodActivity
     */
    public function setPeriodCalendar(PeriodCalendar $periodCalendar = null)
    {
        $this->periodCalendar = $periodCalendar;

        return $this;
    }

    /**
     * Get PeriodCalendar entity (many to one).
     *
     * @return \AppBundle\Entity\PeriodCalendar
     */
    public function getPeriodCalendar()
    {
        return $this->periodCalendar;
    }

    /**
     * Set TTipoDuracion entity (many to one).
     *
     * @param \AppBundle\Entity\TTipoDuracion $tTipoDuracion
     * @return \AppBundle\Entity\PeriodActivity
     */
    public function setTTipoDuracion(TTipoDuracion $tTipoDuracion = null)
    {
        $this->tTipoDuracion = $tTipoDuracion;

        return $this;
    }

    /**
     * Get TTipoDuracion entity (many to one).
     *
     * @return \AppBundle\Entity\TTipoDuracion
     */
    public function getTTipoDuracion()
    {
        return $this->tTipoDuracion;
    }

    /**
     * Set Proccess entity (many to one).
     *
     * @param \AppBundle\Entity\Proccess $proccess
     * @return \AppBundle\Entity\PeriodActivity
     */
    public function setProccess(Proccess $proccess = null)
    {
        $this->proccess = $proccess;

        return $this;
    }

    /**
     * Get Proccess entity (many to one).
     *
     * @return \AppBundle\Entity\Proccess
     */
    public function getProccess()
    {
        return $this->proccess;
    }

    /**
     * Set Unit entity (many to one).
     *
     * @param \AppBundle\Entity\Unit $unit
     * @return \AppBundle\Entity\PeriodActivity
     */
    public function setUnit(Unit $unit = null)
    {
        $this->unit = $unit;

        return $this;
    }

    /**
     * Get Unit entity (many to one).
     *
     * @return \AppBundle\Entity\Unit
     */
    public function getUnit()
    {
        return $this->unit;
    }

    public function __sleep()
    {
        return array('id', 'startdate', 'enddate', 'description', 'duration_id', 'position', 'period_calendar_id', 'ttd_codigo', 'proccess_id', 'unit_id', 'year', 'period');
    }
}