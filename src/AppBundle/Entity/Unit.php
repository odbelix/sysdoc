<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * AppBundle\Entity\Unit
 *
 * @ORM\Entity()
 * @ORM\Table(name="unit")
 */
class Unit
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\Column(name="`name`", type="string", length=200, nullable=true)
     */
    protected $name;

    /**
     * @ORM\Column(type="string", length=45, nullable=true)
     */
    protected $initials;

    /**
     * @ORM\Column(type="string", length=45, nullable=true)
     */
    protected $description;

    /**
     * @ORM\OneToMany(targetEntity="PeriodActivity", mappedBy="unit")
     * @ORM\JoinColumn(name="id", referencedColumnName="unit_id", nullable=false)
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
     * @return \AppBundle\Entity\Unit
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
     * @return \AppBundle\Entity\Unit
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
     * Set the value of initials.
     *
     * @param string $initials
     * @return \AppBundle\Entity\Unit
     */
    public function setInitials($initials)
    {
        $this->initials = $initials;

        return $this;
    }

    /**
     * Get the value of initials.
     *
     * @return string
     */
    public function getInitials()
    {
        return $this->initials;
    }

    /**
     * Set the value of description.
     *
     * @param string $description
     * @return \AppBundle\Entity\Unit
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
     * Add PeriodActivity entity to collection (one to many).
     *
     * @param \AppBundle\Entity\PeriodActivity $periodActivity
     * @return \AppBundle\Entity\Unit
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
     * @return \AppBundle\Entity\Unit
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
        return array('id', 'name', 'initials', 'description');
    }
    public function __toString()
    {
        return $this->getName();
    }
}
