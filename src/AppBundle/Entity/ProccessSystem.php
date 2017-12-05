<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AppBundle\Entity\ProccessSystem
 *
 * @ORM\Entity()
 * @ORM\Table(name="proccess_system", indexes={@ORM\Index(name="fk_proccess_system_proccess1_idx", columns={"proccess_id"}), @ORM\Index(name="fk_proccess_system_system1_idx", columns={"system_id"})})
 */
class ProccessSystem
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
    protected $proccess_id;

    /**
     * @ORM\Column(type="integer")
     */
    protected $system_id;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $created_at;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $updated_at;

    /**
     * @ORM\ManyToOne(targetEntity="Proccess", inversedBy="proccessSystems")
     * @ORM\JoinColumn(name="proccess_id", referencedColumnName="id", nullable=false)
     */
    protected $proccess;

    /**
     * @ORM\ManyToOne(targetEntity="System", inversedBy="proccessSystems")
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
     * @return \AppBundle\Entity\ProccessSystem
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
     * Set the value of proccess_id.
     *
     * @param integer $proccess_id
     * @return \AppBundle\Entity\ProccessSystem
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
     * Set the value of system_id.
     *
     * @param integer $system_id
     * @return \AppBundle\Entity\ProccessSystem
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
     * Set the value of created_at.
     *
     * @param \DateTime $created_at
     * @return \AppBundle\Entity\ProccessSystem
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
     * @return \AppBundle\Entity\ProccessSystem
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
     * Set Proccess entity (many to one).
     *
     * @param \AppBundle\Entity\Proccess $proccess
     * @return \AppBundle\Entity\ProccessSystem
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
     * Set System entity (many to one).
     *
     * @param \AppBundle\Entity\System $system
     * @return \AppBundle\Entity\ProccessSystem
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
        return array('id', 'proccess_id', 'system_id', 'created_at', 'updated_at');
    }
}