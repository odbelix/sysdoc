<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AppBundle\Entity\PeriodActivity
 *
 * @ORM\Entity()
 * @ORM\Table(name="period_activity", indexes={@ORM\Index(name="fk_activity_duration1_idx", columns={"duration_id"})})
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
     * @ORM\ManyToOne(targetEntity="PeriodDuration", inversedBy="periodActivities")
     * @ORM\JoinColumn(name="duration_id", referencedColumnName="id")
     */
    protected $periodDuration;

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

    public function __sleep()
    {
        return array('id', 'startdate', 'enddate', 'description', 'duration_id');
    }
}