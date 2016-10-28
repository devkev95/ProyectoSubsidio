<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\View\View;
use AppBundle\Entity\CuentaBancaria;

class CuentaBancariaServicesControllers extends FOSRestController
{
	
	/**
	* @Rest\Get("/cuenta_bancaria")
	*/
	public function getAction()
	{
		$resultset = $this->getDoctrine()->getRepository("AppBundle:CuentaBancaria")->verTodos();
		if ($resultset == null) {
          return new View("No hay cuentas en la base", Response::HTTP_NOT_FOUND);
     }
        return $resultset;
	}
}
?>