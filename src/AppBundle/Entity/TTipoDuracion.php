<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * AppBundle\Entity\TTipoDuracion
 *
 * @ORM\Entity()
 * @ORM\Table(name="t_tipo_duracion")
 */
class TTipoDuracion
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    protected $ttd_codigo;

    /**
     * @ORM\Column(type="string", length=45, nullable=true)
     */
    protected $ttd_descripcion;

    /**
     * @ORM\Column(type="string", length=2, nullable=true)
     */
    protected $ttd_vigencia;

    /**
     * @ORM\OneToMany(targetEntity="PeriodActivity", mappedBy="tTipoDuracion")
     * @ORM\JoinColumn(name="ttd_codigo", referencedColumnName="ttd_codigo", nullable=false)
     */
    protected $periodActivities;

    public function __construct()
    {
        $this->periodActivities = new ArrayCollection();
    }

    /**
     * Set the value of ttdcodigo.
     *
     * @param integer $ttd_codigo
     * @return \AppBundle\Entity\TTipoDuracion
     */
    public function setTtdCodigo($ttd_codigo)
    {
        $this->ttd_codigo = $ttd_codigo;

        return $this;
    }

    /**
     * Get the value of ttdcodigo.
     *
     * @return integer
     */
    public function getTtdCodigo()
    {
        return $this->ttd_codigo;
    }

    /**
     * Set the value of ttddescripcion.
     *
     * @param string $ttd_descripcion
     * @return \AppBundle\Entity\TTipoDuracion
     */
    public function setTtdDescripcion($ttd_descripcion)
    {
        $this->ttd_descripcion = $ttd_descripcion;

        return $this;
    }

    /**
     * Get the value of ttddescripcion.
     *
     * @return string
     */
    public function getTtdDescripcion()
    {
        return $this->ttd_descripcion;
    }

    /**
     * Set the value of ttdvigencia.
     *
     * @param string $ttd_vigencia
     * @return \AppBundle\Entity\TTipoDuracion
     */
    public function setTtdVigencia($ttd_vigencia)
    {
        $this->ttd_vigencia = $ttd_vigencia;

        return $this;
    }

    /**
     * Get the value of ttdvigencia.
     *
     * @return string
     */
    public function getTtdVigencia()
    {
        return $this->ttd_vigencia;
    }

    /**
     * Add PeriodActivity entity to collection (one to many).
     *
     * @param \AppBundle\Entity\PeriodActivity $periodActivity
     * @return \AppBundle\Entity\TTipoDuracion
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
     * @return \AppBundle\Entity\TTipoDuracion
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

    public function __sleep()
    {
        return array('ttd_codigo', 'ttd_descripcion', 'ttd_vigencia');
    }
}
