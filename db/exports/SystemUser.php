<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AppBundle\Entity\SystemUser
 *
 * @ORM\Entity()
 * @ORM\Table(name="system_users", indexes={@ORM\Index(name="fk_system_users_system_user1_idx", columns={"system_role_id"}), @ORM\Index(name="fk_system_users_system1_idx", columns={"system_id"})})
 */
class SystemUser
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
    protected $system_role_id;

    /**
     * @ORM\Column(type="integer")
     */
    protected $system_id;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $created_at;

    /**
     * @ORM\ManyToOne(targetEntity="SystemRole", inversedBy="systemUsers")
     * @ORM\JoinColumn(name="system_role_id", referencedColumnName="id", nullable=false)
     */
    protected $systemRole;

    /**
     * @ORM\ManyToOne(targetEntity="System", inversedBy="systemUsers")
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
     * @return \AppBundle\Entity\SystemUser
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
     * Set the value of system_role_id.
     *
     * @param integer $system_role_id
     * @return \AppBundle\Entity\SystemUser
     */
    public function setSystemRoleId($system_role_id)
    {
        $this->system_role_id = $system_role_id;

        return $this;
    }

    /**
     * Get the value of system_role_id.
     *
     * @return integer
     */
    public function getSystemRoleId()
    {
        return $this->system_role_id;
    }

    /**
     * Set the value of system_id.
     *
     * @param integer $system_id
     * @return \AppBundle\Entity\SystemUser
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
     * @return \AppBundle\Entity\SystemUser
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
     * Set SystemRole entity (many to one).
     *
     * @param \AppBundle\Entity\SystemRole $systemRole
     * @return \AppBundle\Entity\SystemUser
     */
    public function setSystemRole(SystemRole $systemRole = null)
    {
        $this->systemRole = $systemRole;

        return $this;
    }

    /**
     * Get SystemRole entity (many to one).
     *
     * @return \AppBundle\Entity\SystemRole
     */
    public function getSystemRole()
    {
        return $this->systemRole;
    }

    /**
     * Set System entity (many to one).
     *
     * @param \AppBundle\Entity\System $system
     * @return \AppBundle\Entity\SystemUser
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
        return array('id', 'system_role_id', 'system_id', 'created_at');
    }
}