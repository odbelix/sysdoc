<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * AppBundle\Entity\Proccess
 *
 * @ORM\Entity()
 * @ORM\Table(name="proccess")
 */
class Proccess
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(name="`name`", type="string", length=200, nullable=true)
     */
    protected $name;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    protected $description;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $id_parent;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $created_at;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    protected $identifier;

    /**
     * @ORM\OneToMany(targetEntity="PeriodActivity", mappedBy="proccess")
     * @ORM\JoinColumn(name="id", referencedColumnName="proccess_id", nullable=false)
     */
    protected $periodActivities;

    /**
     * @ORM\OneToMany(targetEntity="ProccessRegulationArt", mappedBy="proccess")
     * @ORM\JoinColumn(name="id", referencedColumnName="proccess_id", nullable=false)
     */
    protected $proccessRegulationArts;

    /**
     * @ORM\OneToMany(targetEntity="ProccessRule", mappedBy="proccess")
     * @ORM\JoinColumn(name="id", referencedColumnName="proccess_id", nullable=false)
     */
    protected $proccessRules;

    /**
     * @ORM\OneToMany(targetEntity="ProccessSystem", mappedBy="proccess")
     * @ORM\JoinColumn(name="id", referencedColumnName="proccess_id", nullable=false)
     */
    protected $proccessSystems;

    /**
     * @ORM\OneToMany(targetEntity="Question", mappedBy="proccess")
     * @ORM\JoinColumn(name="id", referencedColumnName="proccess_id", nullable=false)
     */
    protected $questions;

    public function __construct()
    {
        $this->periodActivities = new ArrayCollection();
        $this->proccessRegulationArts = new ArrayCollection();
        $this->proccessRules = new ArrayCollection();
        $this->proccessSystems = new ArrayCollection();
        $this->questions = new ArrayCollection();
    }

    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \AppBundle\Entity\Proccess
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
     * @return \AppBundle\Entity\Proccess
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
     * @return \AppBundle\Entity\Proccess
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
     * Set the value of id_parent.
     *
     * @param integer $id_parent
     * @return \AppBundle\Entity\Proccess
     */
    public function setIdParent($id_parent)
    {
        $this->id_parent = $id_parent;

        return $this;
    }

    /**
     * Get the value of id_parent.
     *
     * @return integer
     */
    public function getIdParent()
    {
        return $this->id_parent;
    }

    /**
     * Set the value of created_at.
     *
     * @param \DateTime $created_at
     * @return \AppBundle\Entity\Proccess
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
     * Set the value of identifier.
     *
     * @param string $identifier
     * @return \AppBundle\Entity\Proccess
     */
    public function setIdentifier($identifier)
    {
        $this->identifier = $identifier;

        return $this;
    }

    /**
     * Get the value of identifier.
     *
     * @return string
     */
    public function getIdentifier()
    {
        return $this->identifier;
    }

    /**
     * Add PeriodActivity entity to collection (one to many).
     *
     * @param \AppBundle\Entity\PeriodActivity $periodActivity
     * @return \AppBundle\Entity\Proccess
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
     * @return \AppBundle\Entity\Proccess
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

    /**
     * Add ProccessRegulationArt entity to collection (one to many).
     *
     * @param \AppBundle\Entity\ProccessRegulationArt $proccessRegulationArt
     * @return \AppBundle\Entity\Proccess
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
     * @return \AppBundle\Entity\Proccess
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
     * Add ProccessRule entity to collection (one to many).
     *
     * @param \AppBundle\Entity\ProccessRule $proccessRule
     * @return \AppBundle\Entity\Proccess
     */
    public function addProccessRule(ProccessRule $proccessRule)
    {
        $this->proccessRules[] = $proccessRule;

        return $this;
    }

    /**
     * Remove ProccessRule entity from collection (one to many).
     *
     * @param \AppBundle\Entity\ProccessRule $proccessRule
     * @return \AppBundle\Entity\Proccess
     */
    public function removeProccessRule(ProccessRule $proccessRule)
    {
        $this->proccessRules->removeElement($proccessRule);

        return $this;
    }

    /**
     * Get ProccessRule entity collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProccessRules()
    {
        return $this->proccessRules;
    }

    /**
     * Add ProccessSystem entity to collection (one to many).
     *
     * @param \AppBundle\Entity\ProccessSystem $proccessSystem
     * @return \AppBundle\Entity\Proccess
     */
    public function addProccessSystem(ProccessSystem $proccessSystem)
    {
        $this->proccessSystems[] = $proccessSystem;

        return $this;
    }

    /**
     * Remove ProccessSystem entity from collection (one to many).
     *
     * @param \AppBundle\Entity\ProccessSystem $proccessSystem
     * @return \AppBundle\Entity\Proccess
     */
    public function removeProccessSystem(ProccessSystem $proccessSystem)
    {
        $this->proccessSystems->removeElement($proccessSystem);

        return $this;
    }

    /**
     * Get ProccessSystem entity collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProccessSystems()
    {
        return $this->proccessSystems;
    }

    /**
     * Add Question entity to collection (one to many).
     *
     * @param \AppBundle\Entity\Question $question
     * @return \AppBundle\Entity\Proccess
     */
    public function addQuestion(Question $question)
    {
        $this->questions[] = $question;

        return $this;
    }

    /**
     * Remove Question entity from collection (one to many).
     *
     * @param \AppBundle\Entity\Question $question
     * @return \AppBundle\Entity\Proccess
     */
    public function removeQuestion(Question $question)
    {
        $this->questions->removeElement($question);

        return $this;
    }

    /**
     * Get Question entity collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getQuestions()
    {
        return $this->questions;
    }

    public function __sleep()
    {
        return array('id', 'name', 'description', 'id_parent', 'created_at', 'identifier');
    }
}