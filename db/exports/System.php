<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * AppBundle\Entity\System
 *
 * @ORM\Entity()
 * @ORM\Table(name="`system`")
 */
class System
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(name="`name`", type="string", length=200)
     */
    protected $name;

    /**
     * @ORM\Column(type="string", length=500, nullable=true)
     */
    protected $shortdescription;

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
     * @ORM\OneToMany(targetEntity="ProccessSystem", mappedBy="system")
     * @ORM\JoinColumn(name="id", referencedColumnName="system_id", nullable=false)
     */
    protected $proccessSystems;

    /**
     * @ORM\OneToMany(targetEntity="SystemFunctionality", mappedBy="system")
     * @ORM\JoinColumn(name="id", referencedColumnName="system_id", nullable=false)
     */
    protected $systemFunctionalities;

    /**
     * @ORM\OneToMany(targetEntity="SystemNote", mappedBy="system")
     * @ORM\JoinColumn(name="id", referencedColumnName="system_id", nullable=false)
     */
    protected $systemNotes;

    /**
     * @ORM\OneToMany(targetEntity="SystemUser", mappedBy="system")
     * @ORM\JoinColumn(name="id", referencedColumnName="system_id", nullable=false)
     */
    protected $systemUsers;

    public function __construct()
    {
        $this->proccessSystems = new ArrayCollection();
        $this->systemFunctionalities = new ArrayCollection();
        $this->systemNotes = new ArrayCollection();
        $this->systemUsers = new ArrayCollection();
    }

    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \AppBundle\Entity\System
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
     * @return \AppBundle\Entity\System
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
     * Set the value of shortdescription.
     *
     * @param string $shortdescription
     * @return \AppBundle\Entity\System
     */
    public function setShortdescription($shortdescription)
    {
        $this->shortdescription = $shortdescription;

        return $this;
    }

    /**
     * Get the value of shortdescription.
     *
     * @return string
     */
    public function getShortdescription()
    {
        return $this->shortdescription;
    }

    /**
     * Set the value of description.
     *
     * @param string $description
     * @return \AppBundle\Entity\System
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
     * @return \AppBundle\Entity\System
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
     * @return \AppBundle\Entity\System
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
     * Add ProccessSystem entity to collection (one to many).
     *
     * @param \AppBundle\Entity\ProccessSystem $proccessSystem
     * @return \AppBundle\Entity\System
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
     * @return \AppBundle\Entity\System
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
     * Add SystemFunctionality entity to collection (one to many).
     *
     * @param \AppBundle\Entity\SystemFunctionality $systemFunctionality
     * @return \AppBundle\Entity\System
     */
    public function addSystemFunctionality(SystemFunctionality $systemFunctionality)
    {
        $this->systemFunctionalities[] = $systemFunctionality;

        return $this;
    }

    /**
     * Remove SystemFunctionality entity from collection (one to many).
     *
     * @param \AppBundle\Entity\SystemFunctionality $systemFunctionality
     * @return \AppBundle\Entity\System
     */
    public function removeSystemFunctionality(SystemFunctionality $systemFunctionality)
    {
        $this->systemFunctionalities->removeElement($systemFunctionality);

        return $this;
    }

    /**
     * Get SystemFunctionality entity collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSystemFunctionalities()
    {
        return $this->systemFunctionalities;
    }

    /**
     * Add SystemNote entity to collection (one to many).
     *
     * @param \AppBundle\Entity\SystemNote $systemNote
     * @return \AppBundle\Entity\System
     */
    public function addSystemNote(SystemNote $systemNote)
    {
        $this->systemNotes[] = $systemNote;

        return $this;
    }

    /**
     * Remove SystemNote entity from collection (one to many).
     *
     * @param \AppBundle\Entity\SystemNote $systemNote
     * @return \AppBundle\Entity\System
     */
    public function removeSystemNote(SystemNote $systemNote)
    {
        $this->systemNotes->removeElement($systemNote);

        return $this;
    }

    /**
     * Get SystemNote entity collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSystemNotes()
    {
        return $this->systemNotes;
    }

    /**
     * Add SystemUser entity to collection (one to many).
     *
     * @param \AppBundle\Entity\SystemUser $systemUser
     * @return \AppBundle\Entity\System
     */
    public function addSystemUser(SystemUser $systemUser)
    {
        $this->systemUsers[] = $systemUser;

        return $this;
    }

    /**
     * Remove SystemUser entity from collection (one to many).
     *
     * @param \AppBundle\Entity\SystemUser $systemUser
     * @return \AppBundle\Entity\System
     */
    public function removeSystemUser(SystemUser $systemUser)
    {
        $this->systemUsers->removeElement($systemUser);

        return $this;
    }

    /**
     * Get SystemUser entity collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSystemUsers()
    {
        return $this->systemUsers;
    }

    public function __sleep()
    {
        return array('id', 'name', 'shortdescription', 'description', 'created_at', 'updated_at');
    }
}