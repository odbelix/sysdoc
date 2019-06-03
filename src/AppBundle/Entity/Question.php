<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AppBundle\Entity\Question
 *
 * @ORM\Entity()
 * @ORM\Table(name="question", indexes={@ORM\Index(name="fk_question_responsable1_idx", columns={"responsable_id"})})
 */
class Question
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=500)
     */
    protected $title;

    /**
     * @ORM\Column(type="string", length=1000)
     */
    protected $message;

    /**
     * @ORM\Column(type="integer")
     */
    protected $responsable_id;

    /**
     * @ORM\ManyToOne(targetEntity="Responsable", inversedBy="questions")
     * @ORM\JoinColumn(name="responsable_id", referencedColumnName="id", nullable=false)
     */
    protected $responsable;

    public function __construct()
    {
    }

    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \AppBundle\Entity\Question
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
     * @return \AppBundle\Entity\Question
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
     * Set the value of message.
     *
     * @param string $message
     * @return \AppBundle\Entity\Question
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get the value of message.
     *
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set the value of responsable_id.
     *
     * @param integer $responsable_id
     * @return \AppBundle\Entity\Question
     */
    public function setResponsableId($responsable_id)
    {
        $this->responsable_id = $responsable_id;

        return $this;
    }

    /**
     * Get the value of responsable_id.
     *
     * @return integer
     */
    public function getResponsableId()
    {
        return $this->responsable_id;
    }

    /**
     * Set Responsable entity (many to one).
     *
     * @param \AppBundle\Entity\Responsable $responsable
     * @return \AppBundle\Entity\Question
     */
    public function setResponsable(Responsable $responsable = null)
    {
        $this->responsable = $responsable;

        return $this;
    }

    /**
     * Get Responsable entity (many to one).
     *
     * @return \AppBundle\Entity\Responsable
     */
    public function getResponsable()
    {
        return $this->responsable;
    }

    public function __sleep()
    {
        return array('id', 'title', 'message', 'responsable_id');
    }
}