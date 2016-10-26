<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="cuentaBancaria")
 */
class CuentaBancaria
{
	/**
	* @ORM\Column(type="string", length=25, name="numCuenta")
	* @ORM\Id
	*/
	private $numCuenta;

	/**
	* @ORM\Column(type="string", length=50, name="nombreBanco")
	*/
	private $nombreBanco;

	/**
	* @ORM\Column(type="float", name="montoActual")
	*/
	private $montoActual;

    /**
     * Set numCuenta
     *
     * @param string $numCuenta
     *
     * @return CuentaBancaria
     */
    public function setNumCuenta($numCuenta)
    {
        $this->numCuenta = $numCuenta;

        return $this;
    }

    /**
     * Get numCuenta
     *
     * @return string
     */
    public function getNumCuenta()
    {
        return $this->numCuenta;
    }

    /**
     * Set nombreBanco
     *
     * @param string $nombreBanco
     *
     * @return CuentaBancaria
     */
    public function setNombreBanco($nombreBanco)
    {
        $this->nombreBanco = $nombreBanco;

        return $this;
    }

    /**
     * Get nombreBanco
     *
     * @return string
     */
    public function getNombreBanco()
    {
        return $this->nombreBanco;
    }

    /**
     * Set montoActual
     *
     * @param float $montoActual
     *
     * @return CuentaBancaria
     */
    public function setMontoActual($montoActual)
    {
        $this->montoActual = $montoActual;

        return $this;
    }

    /**
     * Get montoActual
     *
     * @return float
     */
    public function getMontoActual()
    {
        return $this->montoActual;
    }
}
