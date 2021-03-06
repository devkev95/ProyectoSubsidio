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

class CuentaBancariaServicesController extends FOSRestController
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


	/**
	* @Rest\Get("/cuenta_bancaria/{numCuenta}")
	*/
	public function numAction($numCuenta)
	{
		$resultset = $this->getDoctrine()->getRepository("AppBundle:CuentaBancaria")->getCuenta($numCuenta);
		if ($resultset == null) {
          return new View("No existe esa cuenta", Response::HTTP_NOT_FOUND);
     }
        return $resultset;
	}





		/**
 	* @Rest\Post("/cuenta_bancaria")
 	*/
 	public function postAction(Request $request){
 		$em = $this->getDoctrine()->getManager();
 		$cuenta = new CuentaBancaria;
 		$data = json_decode($request->getContent(), true);
 		$cuenta->setNumCuenta($data["numCuenta"]);
 		$cuenta->setNombreBanco($data["banco"]);
 		$cuenta->setMontoActual($data["monto"]);
 	
 		$em->persist($cuenta);
 		$em->flush();
 		return new View("Cuenta bancaria agregado exitosamente", Response::HTTP_OK);

 	}




}
?>