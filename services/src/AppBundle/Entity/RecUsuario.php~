<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\RecUsuarioRepository")
 * @ORM\Table(name="recuperarUsuario")
 */
class RecUsuario
{
	/**
	* @ORM\Column(type="string", length=50, name="hash")
	* @ORM\Id
	*/
	private $hash;

	/**
	* @ORM\Column(type="datetime", name="fechaExp")
	*/
	private $fechaExp;

	/**
	* @ORM\Column(type="boolean", name="usado")
	*/
	private $usado;

	 /**
    * @ORM\ManyToOne(targetEntity="Usuario")
    * @ORM\JoinColumn(name="emailUsuario", referencedColumnName="email", nullable=false)
    */
	 private $usuario;

    /**
     * Set hash
     *
     * @param string $hash
     *
     * @return RecUsuario
     */
    public function setHash($hash)
    {
        $this->hash = $hash;

        return $this;
    }

    /**
     * Get hash
     *
     * @return string
     */
    public function getHash()
    {
        return $this->hash;
    }

    /**
     * Set fechaExp
     *
     * @param \DateTime $fechaExp
     *
     * @return RecUsuario
     */
    public function setFechaExp($fechaExp)
    {
        $this->fechaExp = $fechaExp;

        return $this;
    }

    /**
     * Get fechaExp
     *
     * @return \DateTime
     */
    public function getFechaExp()
    {
        return $this->fechaExp;
    }

    /**
     * Set usado
     *
     * @param boolean $usado
     *
     * @return RecUsuario
     */
    public function setUsado($usado)
    {
        $this->usado = $usado;

        return $this;
    }

    /**
     * Get usado
     *
     * @return boolean
     */
    public function getUsado()
    {
        return $this->usado;
    }

    /**
     * Set usuario
     *
     * @param \AppBundle\Entity\Usuario $usuario
     *
     * @return RecUsuario
     */
    public function setUsuario(\AppBundle\Entity\Usuario $usuario)
    {
        $this->usuario = $usuario;

        return $this;
    }

    /**
     * Get usuario
     *
     * @return \AppBundle\Entity\Usuario
     */
    public function getUsuario()
    {
        return $this->usuario;
    }
}
