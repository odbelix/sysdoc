<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * AppBundle\Entity\Meeting
 *
 * @ORM\Entity()
 * @ORM\Table(name="meeting")
 */
class Meeting
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=200)
     */
    protected $title;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    protected $description;

    /**
     * @ORM\Column(type="text")
     */
    protected $participants;

    /**
     * @ORM\OneToMany(targetEntity="MeetingAgreement", mappedBy="meeting")
     * @ORM\JoinColumn(name="id", referencedColumnName="meeting_id", nullable=false)
     */
    protected $meetingAgreements;

    /**
     * @ORM\OneToMany(targetEntity="MeetingNote", mappedBy="meeting")
     * @ORM\JoinColumn(name="id", referencedColumnName="meeting_id", nullable=false)
     */
    protected $meetingNotes;

    public function __construct()
    {
        $this->meetingAgreements = new ArrayCollection();
        $this->meetingNotes = new ArrayCollection();
    }

    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \AppBundle\Entity\Meeting
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
     * Set the value of title.
     *
     * @param string $title
     * @return \AppBundle\Entity\Meeting
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of title.
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of description.
     *
     * @param string $description
     * @return \AppBundle\Entity\Meeting
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
     * Set the value of participants.
     *
     * @param string $participants
     * @return \AppBundle\Entity\Meeting
     */
    public function setParticipants($participants)
    {
        $this->participants = $participants;

        return $this;
    }

    /**
     * Get the value of participants.
     *
     * @return string
     */
    public function getParticipants()
    {
        return $this->participants;
    }

    /**
     * Add MeetingAgreement entity to collection (one to many).
     *
     * @param \AppBundle\Entity\MeetingAgreement $meetingAgreement
     * @return \AppBundle\Entity\Meeting
     */
    public function addMeetingAgreement(MeetingAgreement $meetingAgreement)
    {
        $this->meetingAgreements[] = $meetingAgreement;

        return $this;
    }

    /**
     * Remove MeetingAgreement entity from collection (one to many).
     *
     * @param \AppBundle\Entity\MeetingAgreement $meetingAgreement
     * @return \AppBundle\Entity\Meeting
     */
    public function removeMeetingAgreement(MeetingAgreement $meetingAgreement)
    {
        $this->meetingAgreements->removeElement($meetingAgreement);

        return $this;
    }

    /**
     * Get MeetingAgreement entity collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMeetingAgreements()
    {
        return $this->meetingAgreements;
    }

    /**
     * Add MeetingNote entity to collection (one to many).
     *
     * @param \AppBundle\Entity\MeetingNote $meetingNote
     * @return \AppBundle\Entity\Meeting
     */
    public function addMeetingNote(MeetingNote $meetingNote)
    {
        $this->meetingNotes[] = $meetingNote;

        return $this;
    }

    /**
     * Remove MeetingNote entity from collection (one to many).
     *
     * @param \AppBundle\Entity\MeetingNote $meetingNote
     * @return \AppBundle\Entity\Meeting
     */
    public function removeMeetingNote(MeetingNote $meetingNote)
    {
        $this->meetingNotes->removeElement($meetingNote);

        return $this;
    }

    /**
     * Get MeetingNote entity collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMeetingNotes()
    {
        return $this->meetingNotes;
    }

    public function __sleep()
    {
        return array('id', 'title', 'description', 'participants');
    }
}