<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * AppBundle\Entity\PeriodDuration
 *
 * @ORM\Entity()
 * @ORM\Table(name="period_duration")
 */
class PeriodDuration
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=45, nullable=true)
     */
    protected $title;

    /**
     * @ORM\OneToMany(targetEntity="PeriodActivity", mappedBy="periodDuration")
     * @ORM\JoinColumn(name="id", referencedColumnName="duration_id", nullable=false)
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
     * @return \AppBundle\Entity\PeriodDuration
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
     * Set the value of title.
     *
     * @param string $title
     * @return \AppBundle\Entity\PeriodDuration
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of title.
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Add PeriodActivity entity to collection (one to many).
     *
     * @param \AppBundle\Entity\PeriodActivity $periodActivity
     * @return \AppBundle\Entity\PeriodDuration
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
     * @return \AppBundle\Entity\PeriodDuration
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
        return array('id', 'title');
    }

    public function __toString()
    {
        return $this->getTitle();
    }
}
