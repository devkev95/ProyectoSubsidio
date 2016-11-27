<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ProveedorRepository")
 * @ORM\Table(name="proveedor")
 */
class Proveedor
{
	/**
	* @ORM\Column(type="string", length=15, name="numRegistro")
	* @ORM\Id
	*/
	private $numRegistro;


    /**
    * @ORM\Column(type="text", length=100, name="nombreProveedor")
    */
    private $nombreProveedor;

	/**
	* @ORM\Column(type="text", length=350, name="direccion")
	*/
	private $direccion;

	/**
	* @ORM\Column(type="string", name="telefono", length=12)
	*/
	private $telefono;

	/**
	* @ORM\Column(type="string", name="correoContacto", length=75)
	*/
	private $correoContacto;

	/**
	* @ORM\Column(type="boolean", name="activo")
	*/
	private $estado;




    /**
     * Set numRegistro
     *
     * @param string $numRegistro
     *
     * @return Proveedor
     */
    public function setNumRegistro($numRegistro)
    {
        $this->numRegistro = $numRegistro;

        return $this;
    }

    /**
     * Get numRegistro
     *
     * @return string
     */
    public function getNumRegistro()
    {
        return $this->numRegistro;
    }


     /**
     * Set nombreProveedor
     *
     * @param string $nombreProveedor
     *
     * @return Proveedor
     */
    public function setNombreProveedor($nombreProveedor)
    {
        $this->nombreProveedor = $nombreProveedor;

        return $this;
    }


    /**
     * Get nombreProveedor
     *
     * @return string
     */
    public function getNombreProveedor()
    {
        return $this->nombreProveedor;
    }


    /**
     * Set direccion
     *
     * @param string $direccion
     *
     * @return Proveedor
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;

        return $this;
    }

    /**
     * Get direccion
     *
     * @return string
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Set telefono
     *
     * @param string $telefono
     *
     * @return Proveedor
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }

    /**
     * Get telefono
     *
     * @return string
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set correoContacto
     *
     * @param string $correoContacto
     *
     * @return Proveedor
     */
    public function setCorreoContacto($correoContacto)
    {
        $this->correoContacto = $correoContacto;

        return $this;
    }

    /**
     * Get correoContacto
     *
     * @return string
     */
    public function getCorreoContacto()
    {
        return $this->correoContacto;
    }

    /**
     * Set estado
     *
     * @param boolean $estado
     *
     * @return Proveedor
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get estado
     *
     * @return boolean
     */
    public function getEstado()
    {
        return $this->estado;
    }

   
}
