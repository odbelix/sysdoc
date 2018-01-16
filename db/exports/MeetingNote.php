<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AppBundle\Entity\MeetingNote
 *
 * @ORM\Entity()
 * @ORM\Table(name="meeting_note", indexes={@ORM\Index(name="fk_meeting_note_meeting1_idx", columns={"meeting_id"})})
 */
class MeetingNote
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="text")
     */
    protected $note;

    /**
     * @ORM\Column(type="integer")
     */
    protected $meeting_id;

    /**
     * @ORM\ManyToOne(targetEntity="Meeting", inversedBy="meetingNotes")
     * @ORM\JoinColumn(name="meeting_id", referencedColumnName="id", nullable=false)
     */
    protected $meeting;

    public function __construct()
    {
    }

    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \AppBundle\Entity\MeetingNote
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
     * Set the value of note.
     *
     * @param string $note
     * @return \AppBundle\Entity\MeetingNote
     */
    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }

    /**
     * Get the value of note.
     *
     * @return string
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Set the value of meeting_id.
     *
     * @param integer $meeting_id
     * @return \AppBundle\Entity\MeetingNote
     */
    public function setMeetingId($meeting_id)
    {
        $this->meeting_id = $meeting_id;

        return $this;
    }

    /**
     * Get the value of meeting_id.
     *
     * @return integer
     */
    public function getMeetingId()
    {
        return $this->meeting_id;
    }

    /**
     * Set Meeting entity (many to one).
     *
     * @param \AppBundle\Entity\Meeting $meeting
     * @return \AppBundle\Entity\MeetingNote
     */
    public function setMeeting(Meeting $meeting = null)
    {
        $this->meeting = $meeting;

        return $this;
    }

    /**
     * Get Meeting entity (many to one).
     *
     * @return \AppBundle\Entity\Meeting
     */
    public function getMeeting()
    {
        return $this->meeting;
    }

    public function __sleep()
    {
        return array('id', 'note', 'meeting_id');
    }
}