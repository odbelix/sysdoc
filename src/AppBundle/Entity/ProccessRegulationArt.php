<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AppBundle\Entity\ProccessRegulationArt
 *
 * @ORM\Entity()
 * @ORM\Table(name="proccess_regulation_art", indexes={@ORM\Index(name="fk_proccess_regulation_art_proccess1_idx", columns={"proccess_id"}), @ORM\Index(name="fk_proccess_regulation_art_regulation_art1_idx", columns={"regulation_art_id"})})
 */
class ProccessRegulationArt
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
    protected $regulation_art_id;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $created_at;

    /**
     * @ORM\ManyToOne(targetEntity="Proccess", inversedBy="proccessRegulationArts")
     * @ORM\JoinColumn(name="proccess_id", referencedColumnName="id", nullable=false)
     */
    protected $proccess;

    /**
     * @ORM\ManyToOne(targetEntity="RegulationArt", inversedBy="proccessRegulationArts")
     * @ORM\JoinColumn(name="regulation_art_id", referencedColumnName="id", nullable=false)
     */
    protected $regulationArt;

    public function __construct()
    {
    }

    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \AppBundle\Entity\ProccessRegulationArt
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
     * @return \AppBundle\Entity\ProccessRegulationArt
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
     * Set the value of regulation_art_id.
     *
     * @param integer $regulation_art_id
     * @return \AppBundle\Entity\ProccessRegulationArt
     */
    public function setRegulationArtId($regulation_art_id)
    {
        $this->regulation_art_id = $regulation_art_id;

        return $this;
    }

    /**
     * Get the value of regulation_art_id.
     *
     * @return integer
     */
    public function getRegulationArtId()
    {
        return $this->regulation_art_id;
    }

    /**
     * Set the value of created_at.
     *
     * @param \DateTime $created_at
     * @return \AppBundle\Entity\ProccessRegulationArt
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
     * Set Proccess entity (many to one).
     *
     * @param \AppBundle\Entity\Proccess $proccess
     * @return \AppBundle\Entity\ProccessRegulationArt
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
     * Set RegulationArt entity (many to one).
     *
     * @param \AppBundle\Entity\RegulationArt $regulationArt
     * @return \AppBundle\Entity\ProccessRegulationArt
     */
    public function setRegulationArt(RegulationArt $regulationArt = null)
    {
        $this->regulationArt = $regulationArt;

        return $this;
    }

    /**
     * Get RegulationArt entity (many to one).
     *
     * @return \AppBundle\Entity\RegulationArt
     */
    public function getRegulationArt()
    {
        return $this->regulationArt;
    }

    public function __sleep()
    {
        return array('id', 'proccess_id', 'regulation_art_id', 'created_at');
    }
}