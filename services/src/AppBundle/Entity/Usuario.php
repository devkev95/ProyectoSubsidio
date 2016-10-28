<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\AdvancedUserInterface;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UsuarioRepository")
 * @ORM\Table(name="usuario")
 */
class Usuario implements AdvancedUserInterface{

	/**
     * @ORM\Column(type="string", name="email", length=150)
     * @ORM\Id
     */
	private $email;

	/**
	* @ORM\Column(type="string", name="`password`", length=60)
	*/
	private $password;

	/**
	* @ORM\Column(type="string", name="nombres", length=75)
	*/
	private $nombre;

	/**
	* @ORM\Column(type="string", name="apellidos", length=75)
	*/
	private $apellidos;

	/**
	* @ORM\Column(type="boolean", name="activo")
	*/
	private $estado;

	 /**
    * @ORM\ManyToOne(targetEntity="Rol")
    * @ORM\JoinColumn(name="rolId", referencedColumnName="idRol")
    */
	 private $rol;


    /**
     * Set email
     *
     * @param string $email
     *
     * @return Usuario
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return Usuario
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Usuario
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set apellidos
     *
     * @param string $apellidos
     *
     * @return Usuario
     */
    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;

        return $this;
    }

    /**
     * Get apellidos
     *
     * @return string
     */
    public function getApellidos()
    {
        return $this->apellidos;
    }

    /**
     * Set estado
     *
     * @param boolean $estado
     *
     * @return Usuario
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

    /**
     * Set rol
     *
     * @param \AppBundle\Entity\Rol $rol
     *
     * @return Usuario
     */
    public function setRol(\AppBundle\Entity\Rol $rol = null)
    {
        $this->rol = $rol;

        return $this;
    }

    /**
     * Get rol
     *
     * @return \AppBundle\Entity\Rol
     */
    public function getRol()
    {
        return $this->rol;
    }

     public function getUsername()
    {
        return $this->email;
    }

    public function getRoles()
    {
        if ($this->rol->getNombre() == "Jefe") {
            return ['ROLE_BOSS'];
        }else if ($this->rol->getNombre() == "Administrativo"){
            return ['ROLE_USER'];
        }else if ($this->rol->getNombre() == "Administrador"){
            return ['ROLE_ADMIN'];
        }
    }
    
    public function getSalt()
    {
    }
    public function eraseCredentials()
    {
    }

    public function isAccountNonExpired()
    {
        return true;
    }

    public function isAccountNonLocked()
    {
        return true;
    }

    public function isCredentialsNonExpired()
    {
        return true;
    }

    public function isEnabled()
    {
        return $this->estado;
    }

}
