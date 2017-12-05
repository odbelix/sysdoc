<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * AppBundle\Entity\PeriodCalendar
 *
 * @ORM\Entity()
 * @ORM\Table(name="period_calendar")
 */
class PeriodCalendar
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(name="`name`", type="string", length=200)
     */
    protected $name;

    /**
     * @ORM\Column(type="string", length=4)
     */
    protected $identify;

    /**
     * @ORM\OneToMany(targetEntity="PeriodActivity", mappedBy="periodCalendar")
     * @ORM\JoinColumn(name="id", referencedColumnName="period_calendar_id", nullable=false)
     */
    protected $periodActivities;

    public function __construct()
    {
        $this->periodActivities = new ArrayCollection();
    }

    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \AppBundle\Entity\PeriodCalendar
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
     * Set the value of name.
     *
     * @param string $name
     * @return \AppBundle\Entity\PeriodCalendar
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of identify.
     *
     * @param string $identify
     * @return \AppBundle\Entity\PeriodCalendar
     */
    public function setIdentify($identify)
    {
        $this->identify = $identify;

        return $this;
    }

    /**
     * Get the value of identify.
     *
     * @return string
     */
    public function getIdentify()
    {
        return $this->identify;
    }

    /**
     * Add PeriodActivity entity to collection (one to many).
     *
     * @param \AppBundle\Entity\PeriodActivity $periodActivity
     * @return \AppBundle\Entity\PeriodCalendar
     */
    public function addPeriodActivity(PeriodActivity $periodActivity)
    {
        $this->periodActivities[] = $periodActivity;

        return $this;
    }

    /**
     * Remove PeriodActivity entity from collection (one to many).
     *
     * @param \AppBundle\Entity\PeriodActivity $periodActivity
     * @return \AppBundle\Entity\PeriodCalendar
     */
    public function removePeriodActivity(PeriodActivity $periodActivity)
    {
        $this->periodActivities->removeElement($periodActivity);

        return $this;
    }

    /**
     * Get PeriodActivity entity collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPeriodActivities()
    {
        return $this->periodActivities;
    }

    public function __sleep()
    {
        return array('id', 'name', 'identify');
    }
}