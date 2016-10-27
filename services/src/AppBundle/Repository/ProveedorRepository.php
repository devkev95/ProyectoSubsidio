<?php

namespace AppBundle\Repository;

/**
 * ProveedorRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ProveedorRepository extends \Doctrine\ORM\EntityRepository
{
	public function verTodos(){
		$dql = "SELECT p from AppBundle:Proveedor p";
		$query = $this->getEntityManager()->createQuery($dql);
		return $query->getResult();
	}


	public function find($num){
		$dql = "SELECT p from AppBundle:Proveedor p WHERE p.numRegistro=?1";
		$query = $this->getEntityManager()->createQuery($dql);
		$query -> setParameter(1,$num);
		return $query->getResult();
	}

}
