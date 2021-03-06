<?php

namespace AppBundle\Repository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\View\View;
use AppBundle\Entity\Transaccion;
use AppBundle\Entity\CuentaBancaria;


/**
 * TransaccionRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class TransaccionRepository extends \Doctrine\ORM\EntityRepository
{


public function verTodos()
	{
		$dql = "SELECT t FROM AppBundle:Transaccion t";
		$query = $this->getEntityManager()->createQuery($dql);
		return $query->getResult();
	}



	
}
