<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * AppBundle\Entity\SystemAdjustment
 *
 * @ORM\Entity()
 * @ORM\Table(name="system_adjustment")
 */
class SystemAdjustment
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
     * @ORM\OneToMany(targetEntity="SystemNote", mappedBy="systemAdjustment")
     * @ORM\JoinColumn(name="id", referencedColumnName="adjustment_id", nullable=false)
     */
    protected $systemNotes;

    public function __construct()
    {
        $this->systemNotes = new ArrayCollection();
    }

    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \AppBundle\Entity\SystemAdjustment
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
     * @return \AppBundle\Entity\SystemAdjustment
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
     * Add SystemNote entity to collection (one to many).
     *
     * @param \AppBundle\Entity\SystemNote $systemNote
     * @return \AppBundle\Entity\SystemAdjustment
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
     * @return \AppBundle\Entity\SystemAdjustment
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

    public function __sleep()
    {
        return array('id', 'name');
    }
}