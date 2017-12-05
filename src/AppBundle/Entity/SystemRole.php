<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * AppBundle\Entity\SystemRole
 *
 * @ORM\Entity()
 * @ORM\Table(name="system_role")
 */
class SystemRole
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
     * @ORM\OneToMany(targetEntity="SystemUser", mappedBy="systemRole")
     * @ORM\JoinColumn(name="id", referencedColumnName="system_role_id", nullable=false)
     */
    protected $systemUsers;

    public function __construct()
    {
        $this->systemUsers = new ArrayCollection();
        $this->setCreatedAt(new \Datetime("now"));
    }

    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \AppBundle\Entity\SystemRole
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
     * @return \AppBundle\Entity\SystemRole
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
     * @return \AppBundle\Entity\SystemRole
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
     * @return \AppBundle\Entity\SystemRole
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
     * @return \AppBundle\Entity\SystemRole
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
     * Add SystemUser entity to collection (one to many).
     *
     * @param \AppBundle\Entity\SystemUser $systemUser
     * @return \AppBundle\Entity\SystemRole
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
     * @return \AppBundle\Entity\SystemRole
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
        return array('id', 'name', 'description', 'created_at', 'updated_at');
    }
}
