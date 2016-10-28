<?php

namespace AppBundle\Repository;

/**
 * RolRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class RolRepository extends \Doctrine\ORM\EntityRepository
{
	public function verTodosRol(){
		$dql = "SELECT r from AppBundle:Rol r";
		$query = $this->getEntityManager()->createQuery($dql);
		return $query->getResult();
	}

	public function getRol($id)
	{
		$dql = "SELECT c FROM AppBundle:Rol c WHERE c.id = :rolId";
		$query = $this->getEntityManager()->createQuery($dql);
		$query->setParameter("rolId", $id);
		return $query->getOneOrNullResult();
	}
}
