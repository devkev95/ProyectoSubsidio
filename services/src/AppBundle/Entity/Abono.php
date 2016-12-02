<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Abono
 *
 * @ORM\Table(name="abono")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AbonoRepository")
 */
class Abono
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $numAbono;



     /**
     * @ORM\ManyToOne(targetEntity="CuentaBancaria")
     * @ORM\JoinColumn(name="cuentaBancaria", referencedColumnName="numCuenta", nullable=false)
     */
    private $cuentaBancaria;

    /**
     * @var float
     *
     * @ORM\Column(name="montoAbono", type="float")
     */
    private $montoAbono;



    /**
     * Get numAbono
     *
     * @return int
     */
    public function getNumAbono()
    {
        return $this->numAbono;
    }

    /**
     * Set cuentaBancaria
     *
     * @param string $cuentaBancaria
     *
     * @return Abono
     */
    public function setCuentaBancaria($cuentaBancaria)
    {
        $this->cuentaBancaria = $cuentaBancaria;

        return $this;
    }

    /**
     * Get cuentaBancaria
     *
     * @return string
     */
    public function getCuentaBancaria()
    {
        return $this->cuentaBancaria;
    }

    /**
     * Set montoAbono
     *
     * @param float $montoAbono
     *
     * @return Abono
     */
    public function setMontoAbono($montoAbono)
    {
        $this->montoAbono = $montoAbono;

        return $this;
    }

    /**
     * Get montoAbono
     *
     * @return float
     */
    public function getMontoAbono()
    {
        return $this->montoAbono;
    }
}

