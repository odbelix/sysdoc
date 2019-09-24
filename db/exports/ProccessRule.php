<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AppBundle\Entity\ProccessRule
 *
 * @ORM\Entity()
 * @ORM\Table(name="proccess_rule", indexes={@ORM\Index(name="fk_proccess_rule_proccess1_idx", columns={"proccess_id"})})
 */
class ProccessRule
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
     * @ORM\Column(name="`name`", type="string", length=200, nullable=true)
     */
    protected $name;

    /**
     * @ORM\Column(name="`text`", type="string", length=45, nullable=true)
     */
    protected $text;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $created_at;

    /**
     * @ORM\ManyToOne(targetEntity="Proccess", inversedBy="proccessRules")
     * @ORM\JoinColumn(name="proccess_id", referencedColumnName="id", nullable=false)
     */
    protected $proccess;

    public function __construct()
    {
    }

    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \AppBundle\Entity\ProccessRule
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
     * @return \AppBundle\Entity\ProccessRule
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
     * Set the value of name.
     *
     * @param string $name
     * @return \AppBundle\Entity\ProccessRule
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
     * Set the value of text.
     *
     * @param string $text
     * @return \AppBundle\Entity\ProccessRule
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Get the value of text.
     *
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set the value of created_at.
     *
     * @param \DateTime $created_at
     * @return \AppBundle\Entity\ProccessRule
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
     * @return \AppBundle\Entity\ProccessRule
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

    public function __sleep()
    {
        return array('id', 'proccess_id', 'name', 'text', 'created_at');
    }
}