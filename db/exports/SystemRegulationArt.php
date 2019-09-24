<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AppBundle\Entity\SystemRegulationArt
 *
 * @ORM\Entity()
 * @ORM\Table(name="system_regulation_art", indexes={@ORM\Index(name="fk_system_regulation_art_system_functionality1_idx", columns={"system_functionality_id"}), @ORM\Index(name="fk_system_regulation_art_regulation_art1_idx", columns={"regulation_art_id"})})
 */
class SystemRegulationArt
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
    protected $system_functionality_id;

    /**
     * @ORM\Column(type="integer")
     */
    protected $regulation_art_id;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $created_at;

    /**
     * @ORM\ManyToOne(targetEntity="SystemFunctionality", inversedBy="systemRegulationArts")
     * @ORM\JoinColumn(name="system_functionality_id", referencedColumnName="id", nullable=false)
     */
    protected $systemFunctionality;

    /**
     * @ORM\ManyToOne(targetEntity="RegulationArt", inversedBy="systemRegulationArts")
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
     * @return \AppBundle\Entity\SystemRegulationArt
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
     * Set the value of system_functionality_id.
     *
     * @param integer $system_functionality_id
     * @return \AppBundle\Entity\SystemRegulationArt
     */
    public function setSystemFunctionalityId($system_functionality_id)
    {
        $this->system_functionality_id = $system_functionality_id;

        return $this;
    }

    /**
     * Get the value of system_functionality_id.
     *
     * @return integer
     */
    public function getSystemFunctionalityId()
    {
        return $this->system_functionality_id;
    }

    /**
     * Set the value of regulation_art_id.
     *
     * @param integer $regulation_art_id
     * @return \AppBundle\Entity\SystemRegulationArt
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
     * @return \AppBundle\Entity\SystemRegulationArt
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
     * Set SystemFunctionality entity (many to one).
     *
     * @param \AppBundle\Entity\SystemFunctionality $systemFunctionality
     * @return \AppBundle\Entity\SystemRegulationArt
     */
    public function setSystemFunctionality(SystemFunctionality $systemFunctionality = null)
    {
        $this->systemFunctionality = $systemFunctionality;

        return $this;
    }

    /**
     * Get SystemFunctionality entity (many to one).
     *
     * @return \AppBundle\Entity\SystemFunctionality
     */
    public function getSystemFunctionality()
    {
        return $this->systemFunctionality;
    }

    /**
     * Set RegulationArt entity (many to one).
     *
     * @param \AppBundle\Entity\RegulationArt $regulationArt
     * @return \AppBundle\Entity\SystemRegulationArt
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
        return array('id', 'system_functionality_id', 'regulation_art_id', 'created_at');
    }
}