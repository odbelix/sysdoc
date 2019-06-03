<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AppBundle\Entity\SystemNote
 *
 * @ORM\Entity()
 * @ORM\Table(name="system_note", indexes={@ORM\Index(name="fk_note_adjustment1_idx", columns={"adjustment_id"}), @ORM\Index(name="fk_system_note_system1_idx", columns={"system_id"})})
 */
class SystemNote
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(name="`name`", type="string", length=500, nullable=true)
     */
    protected $name;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    protected $description;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $created_at;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $updated_at;

    /**
     * @ORM\Column(name="`year`", type="decimal", nullable=true)
     */
    protected $year;

    /**
     * @ORM\Column(type="decimal", nullable=true)
     */
    protected $period;

    /**
     * @ORM\Column(type="integer")
     */
    protected $adjustment_id;

    /**
     * @ORM\Column(type="integer")
     */
    protected $system_id;

    /**
     * @ORM\ManyToOne(targetEntity="SystemAdjustment", inversedBy="systemNotes")
     * @ORM\JoinColumn(name="adjustment_id", referencedColumnName="id", nullable=false)
     */
    protected $systemAdjustment;

    /**
     * @ORM\ManyToOne(targetEntity="System", inversedBy="systemNotes")
     * @ORM\JoinColumn(name="system_id", referencedColumnName="id", nullable=false)
     */
    protected $system;

    public function __construct()
    {
    }

    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \AppBundle\Entity\SystemNote
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
     * @return \AppBundle\Entity\SystemNote
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
     * Set the value of description.
     *
     * @param string $description
     * @return \AppBundle\Entity\SystemNote
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
     * Set the value of created_at.
     *
     * @param \DateTime $created_at
     * @return \AppBundle\Entity\SystemNote
     */
    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;

        return $this;
    }

    /**
     * Get the value of created_at.
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Set the value of updated_at.
     *
     * @param \DateTime $updated_at
     * @return \AppBundle\Entity\SystemNote
     */
    public function setUpdatedAt($updated_at)
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    /**
     * Get the value of updated_at.
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /**
     * Set the value of year.
     *
     * @param float $year
     * @return \AppBundle\Entity\SystemNote
     */
    public function setYear($year)
    {
        $this->year = $year;

        return $this;
    }

    /**
     * Get the value of year.
     *
     * @return float
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * Set the value of period.
     *
     * @param float $period
     * @return \AppBundle\Entity\SystemNote
     */
    public function setPeriod($period)
    {
        $this->period = $period;

        return $this;
    }

    /**
     * Get the value of period.
     *
     * @return float
     */
    public function getPeriod()
    {
        return $this->period;
    }

    /**
     * Set the value of adjustment_id.
     *
     * @param integer $adjustment_id
     * @return \AppBundle\Entity\SystemNote
     */
    public function setAdjustmentId($adjustment_id)
    {
        $this->adjustment_id = $adjustment_id;

        return $this;
    }

    /**
     * Get the value of adjustment_id.
     *
     * @return integer
     */
    public function getAdjustmentId()
    {
        return $this->adjustment_id;
    }

    /**
     * Set the value of system_id.
     *
     * @param integer $system_id
     * @return \AppBundle\Entity\SystemNote
     */
    public function setSystemId($system_id)
    {
        $this->system_id = $system_id;

        return $this;
    }

    /**
     * Get the value of system_id.
     *
     * @return integer
     */
    public function getSystemId()
    {
        return $this->system_id;
    }

    /**
     * Set SystemAdjustment entity (many to one).
     *
     * @param \AppBundle\Entity\SystemAdjustment $systemAdjustment
     * @return \AppBundle\Entity\SystemNote
     */
    public function setSystemAdjustment(SystemAdjustment $systemAdjustment = null)
    {
        $this->systemAdjustment = $systemAdjustment;

        return $this;
    }

    /**
     * Get SystemAdjustment entity (many to one).
     *
     * @return \AppBundle\Entity\SystemAdjustment
     */
    public function getSystemAdjustment()
    {
        return $this->systemAdjustment;
    }

    /**
     * Set System entity (many to one).
     *
     * @param \AppBundle\Entity\System $system
     * @return \AppBundle\Entity\SystemNote
     */
    public function setSystem(System $system = null)
    {
        $this->system = $system;

        return $this;
    }

    /**
     * Get System entity (many to one).
     *
     * @return \AppBundle\Entity\System
     */
    public function getSystem()
    {
        return $this->system;
    }

    public function __sleep()
    {
        return array('id', 'name', 'description', 'created_at', 'updated_at', 'year', 'period', 'adjustment_id', 'system_id');
    }
}