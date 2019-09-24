<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * AppBundle\Entity\Regulation
 *
 * @ORM\Entity()
 * @ORM\Table(name="regulation")
 */
class Regulation
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(name="`valid`", type="boolean")
     */
    protected $valid;

    /**
     * @ORM\Column(name="`name`", type="string", length=200, nullable=true)
     */
    protected $name;

    /**
     * @ORM\Column(name="`number`", type="string", length=45, nullable=true)
     */
    protected $number;

    /**
     * @ORM\Column(name="`date`", type="string", length=45, nullable=true)
     */
    protected $date;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $created_at;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $updated_at;

    /**
     * @ORM\OneToMany(targetEntity="RegulationArt", mappedBy="regulation")
     * @ORM\JoinColumn(name="id", referencedColumnName="regulation_id", nullable=false)
     */
    protected $regulationArts;

    public function __construct()
    {
        $this->regulationArts = new ArrayCollection();
    }

    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \AppBundle\Entity\Regulation
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
     * Set the value of valid.
     *
     * @param boolean $valid
     * @return \AppBundle\Entity\Regulation
     */
    public function setValid($valid)
    {
        $this->valid = $valid;

        return $this;
    }

    /**
     * Get the value of valid.
     *
     * @return boolean
     */
    public function getValid()
    {
        return $this->valid;
    }

    /**
     * Set the value of name.
     *
     * @param string $name
     * @return \AppBundle\Entity\Regulation
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
     * Set the value of number.
     *
     * @param string $number
     * @return \AppBundle\Entity\Regulation
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Get the value of number.
     *
     * @return string
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set the value of date.
     *
     * @param string $date
     * @return \AppBundle\Entity\Regulation
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get the value of date.
     *
     * @return string
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set the value of created_at.
     *
     * @param \DateTime $created_at
     * @return \AppBundle\Entity\Regulation
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
     * @return \AppBundle\Entity\Regulation
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
     * Add RegulationArt entity to collection (one to many).
     *
     * @param \AppBundle\Entity\RegulationArt $regulationArt
     * @return \AppBundle\Entity\Regulation
     */
    public function addRegulationArt(RegulationArt $regulationArt)
    {
        $this->regulationArts[] = $regulationArt;

        return $this;
    }

    /**
     * Remove RegulationArt entity from collection (one to many).
     *
     * @param \AppBundle\Entity\RegulationArt $regulationArt
     * @return \AppBundle\Entity\Regulation
     */
    public function removeRegulationArt(RegulationArt $regulationArt)
    {
        $this->regulationArts->removeElement($regulationArt);

        return $this;
    }

    /**
     * Get RegulationArt entity collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRegulationArts()
    {
        return $this->regulationArts;
    }

    public function __sleep()
    {
        return array('id', 'valid', 'name', 'number', 'date', 'created_at', 'updated_at');
    }
}