<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * AppBundle\Entity\SystemFunctionality
 *
 * @ORM\Entity()
 * @ORM\Table(name="system_functionality", indexes={@ORM\Index(name="fk_functionality_system_idx", columns={"system_id"})})
 */
class SystemFunctionality
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="integer")
     */
    protected $system_id;

    /**
     * @ORM\Column(name="`name`", type="string", length=45, nullable=true)
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
     * @ORM\OneToMany(targetEntity="SystemRegulationArt", mappedBy="systemFunctionality")
     * @ORM\JoinColumn(name="id", referencedColumnName="system_functionality_id", nullable=false)
     */
    protected $systemRegulationArts;

    /**
     * @ORM\ManyToOne(targetEntity="System", inversedBy="systemFunctionalities")
     * @ORM\JoinColumn(name="system_id", referencedColumnName="id", nullable=false)
     */
    protected $system;

    public function __construct()
    {
        $this->systemRegulationArts = new ArrayCollection();
    }

    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \AppBundle\Entity\SystemFunctionality
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
     * Set the value of system_id.
     *
     * @param integer $system_id
     * @return \AppBundle\Entity\SystemFunctionality
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
     * Set the value of name.
     *
     * @param string $name
     * @return \AppBundle\Entity\SystemFunctionality
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
     * @return \AppBundle\Entity\SystemFunctionality
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
     * @return \AppBundle\Entity\SystemFunctionality
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
     * @return \AppBundle\Entity\SystemFunctionality
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
     * Add SystemRegulationArt entity to collection (one to many).
     *
     * @param \AppBundle\Entity\SystemRegulationArt $systemRegulationArt
     * @return \AppBundle\Entity\SystemFunctionality
     */
    public function addSystemRegulationArt(SystemRegulationArt $systemRegulationArt)
    {
        $this->systemRegulationArts[] = $systemRegulationArt;

        return $this;
    }

    /**
     * Remove SystemRegulationArt entity from collection (one to many).
     *
     * @param \AppBundle\Entity\SystemRegulationArt $systemRegulationArt
     * @return \AppBundle\Entity\SystemFunctionality
     */
    public function removeSystemRegulationArt(SystemRegulationArt $systemRegulationArt)
    {
        $this->systemRegulationArts->removeElement($systemRegulationArt);

        return $this;
    }

    /**
     * Get SystemRegulationArt entity collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSystemRegulationArts()
    {
        return $this->systemRegulationArts;
    }

    /**
     * Set System entity (many to one).
     *
     * @param \AppBundle\Entity\System $system
     * @return \AppBundle\Entity\SystemFunctionality
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
        return array('id', 'system_id', 'name', 'description', 'created_at', 'updated_at');
    }
}