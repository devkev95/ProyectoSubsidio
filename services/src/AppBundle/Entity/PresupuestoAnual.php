<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PresupuestoAnualRepository")
 * @ORM\Table(name="presupuestoAnual")
 */
class PresupuestoAnual
{
	/**
	* @ORM\Column(type="string", length=10, name="año")
	* @ORM\Id
	*/
	private $año;

	/**
	* @ORM\Column(type="float", name="monto")
	*/
	private $monto;

    /**
     * Set año
     *
     * @param string $año
     *
     * @return PresupuestoAnual
     */
    public function setAño($año)
    {
        $this->año = $año;

        return $this;
    }

    /**
     * Get año
     *
     * @return string
     */
    public function getAño()
    {
        return $this->año;
    }

   
    /**
     * Set montoActual
     *
     * @param float $monto
     *
     * @return PresupuestoAnual
     */
    public function setMonto($monto)
    {
        $this->monto= $monto;

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
