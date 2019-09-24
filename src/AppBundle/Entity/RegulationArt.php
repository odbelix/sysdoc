<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * AppBundle\Entity\RegulationArt
 *
 * @ORM\Entity()
 * @ORM\Table(name="regulation_art", indexes={@ORM\Index(name="fk_regulation_art_regulation1_idx", columns={"regulation_id"})})
 */
class RegulationArt
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
    protected $created_at;

    /**
     * @ORM\Column(type="integer")
     */
    protected $regulation_id;

    /**
     * @ORM\Column(name="`name`", type="string", length=45, nullable=true)
     */
    protected $name;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    protected $detail;

    /**
     * @ORM\OneToMany(targetEntity="ProccessRegulationArt", mappedBy="regulationArt")
     * @ORM\JoinColumn(name="id", referencedColumnName="regulation_art_id", nullable=false)
     */
    protected $proccessRegulationArts;

    /**
     * @ORM\OneToMany(targetEntity="SystemRegulationArt", mappedBy="regulationArt")
     * @ORM\JoinColumn(name="id", referencedColumnName="regulation_art_id", nullable=false)
     */
    protected $systemRegulationArts;

    /**
     * @ORM\ManyToOne(targetEntity="Regulation", inversedBy="regulationArts")
     * @ORM\JoinColumn(name="regulation_id", referencedColumnName="id", nullable=false)
     */
    protected $regulation;

    public function __construct()
    {
        $this->proccessRegulationArts = new ArrayCollection();
        $this->systemRegulationArts = new ArrayCollection();
    }

    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \AppBundle\Entity\RegulationArt
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
     * Set the value of created_at.
     *
     * @param \DateTime $created_at
     * @return \AppBundle\Entity\RegulationArt
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
     * Set the value of regulation_id.
     *
     * @param integer $regulation_id
     * @return \AppBundle\Entity\RegulationArt
     */
    public function setRegulationId($regulation_id)
    {
        $this->regulation_id = $regulation_id;

        return $this;
    }

    /**
     * Get the value of regulation_id.
     *
     * @return integer
     */
    public function getRegulationId()
    {
        return $this->regulation_id;
    }

    /**
     * Set the value of name.
     *
     * @param string $name
     * @return \AppBundle\Entity\RegulationArt
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
     * Set the value of detail.
     *
     * @param string $detail
     * @return \AppBundle\Entity\RegulationArt
     */
    public function setDetail($detail)
    {
        $this->detail = $detail;

        return $this;
    }

    /**
     * Get the value of detail.
     *
     * @return string
     */
    public function getDetail()
    {
        return $this->detail;
    }

    /**
     * Add ProccessRegulationArt entity to collection (one to many).
     *
     * @param \AppBundle\Entity\ProccessRegulationArt $proccessRegulationArt
     * @return \AppBundle\Entity\RegulationArt
     */
    public function addProccessRegulationArt(ProccessRegulationArt $proccessRegulationArt)
    {
        $this->proccessRegulationArts[] = $proccessRegulationArt;

        return $this;
    }

    /**
     * Remove ProccessRegulationArt entity from collection (one to many).
     *
     * @param \AppBundle\Entity\ProccessRegulationArt $proccessRegulationArt
     * @return \AppBundle\Entity\RegulationArt
     */
    public function removeProccessRegulationArt(ProccessRegulationArt $proccessRegulationArt)
    {
        $this->proccessRegulationArts->removeElement($proccessRegulationArt);

        return $this;
    }

    /**
     * Get ProccessRegulationArt entity collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProccessRegulationArts()
    {
        return $this->proccessRegulationArts;
    }

    /**
     * Add SystemRegulationArt entity to collection (one to many).
     *
     * @param \AppBundle\Entity\SystemRegulationArt $systemRegulationArt
     * @return \AppBundle\Entity\RegulationArt
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
     * @return \AppBundle\Entity\RegulationArt
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
     * Set Regulation entity (many to one).
     *
     * @param \AppBundle\Entity\Regulation $regulation
     * @return \AppBundle\Entity\RegulationArt
     */
    public function setRegulation(Regulation $regulation = null)
    {
        $this->regulation = $regulation;

        return $this;
    }

    /**
     * Get Regulation entity (many to one).
     *
     * @return \AppBundle\Entity\Regulation
     */
    public function getRegulation()
    {
        return $this->regulation;
    }

    public function __sleep()
    {
        return array('id', 'created_at', 'regulation_id', 'name', 'detail');
    }
}