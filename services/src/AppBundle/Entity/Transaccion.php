<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Transaccion
 *
 * @ORM\Table(name="transaccion")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TransaccionRepository")
 */
class Transaccion
{
    /**
     * @var int
     *
     * @ORM\Column(name="numTransaccion", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $numTransaccion;

 

    /**
     * @var int
     *
     * @ORM\Column(name="tipoTransaccion", type="integer")
     */
    private $tipoTransaccion;




    /**
     * @ORM\ManyToOne(targetEntity="CuentaBancaria")
     * @ORM\JoinColumn(name="cuentaBancaria", referencedColumnName="numCuenta", nullable=false)
     */
    private $cuentaBancaria;





    /**
     * @ORM\ManyToOne(targetEntity="Proveedor")
     * @ORM\JoinColumn(name="proveedor", referencedColumnName="numRegistro", nullable=false)
     */
    private $proveedor;








    /**
    * @ORM\Column(type="float", name="monto")
    */
    private $monto;

    /**
     * Get id
     *
     * @return int
     */
    public function getNumTransaccion()
    {
        return $this->id;
    }

    
    /**
     * Set tipoTransaccion
     *
     * @param integer $tipoTransaccion
     *
     * @return Transaccion
     */
    public function setTipoTransaccion($tipoTransaccion)
    {
        $this->tipoTransaccion = $tipoTransaccion;

        return $this;
    }

    /**
     * Get tipoTransaccion
     *
     * @return int
     */
    public function getTipoTransaccion()
    {
        return $this->tipoTransaccion;
    }

    /**
     * Set cuentaBancaria
     *
     * @param string $cuentaBancaria
     *
     * @return Transaccion
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
     * Set proveedor
     *
     * @param string $proveedor
     *
     * @return Transaccion
     */
    public function setProveedor($proveedor)
    {
        $this->proveedor = $proveedor;

        return $this;
    }

    /**
     * Get proveedor
     *
     * @return string
     */
    public function getProveedor()
    {
        return $this->proveedor;
    }




     /**
     * Set monto
     *
     * @param float $monto
     *
     * @return Transaccion
     */
    public function setMonto($monto)
    {
        $this->monto = $monto;

        return $this;
    }

    /**
     * Get monto
     *
     * @return float
     */
    public function getMonto()
    {
        return $this->monto;
    }



}

