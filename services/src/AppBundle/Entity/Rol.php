<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\RolRepository")
 * @ORM\Table(name="rol")
 */
class Rol
{
	/**
     * @ORM\Column(type="smallint", name="idRol")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
	private $id;

	/**
	* @ORM\Column(name="nombreRol", length=75, type="string")
	*/
	private $nombre;

  /**
   * @ORM\OneToMany(targetEntity="Usuario", mappedBy="rol")
   **/

    private $Usuarios;

  /**
   * Constructor
   */
  public function __construct()
  {
      $this->usuarios = new \Doctrine\Common\Collections\ArrayCollection();
  }  


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set id
     *
     * @param smallint $id
     *
     * @return Rol
     */
    public function setId()
    {
        return $this->id= $id;

        return $this;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Rol
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
}
