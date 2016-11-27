<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\View\View;
use AppBundle\Entity\Transaccion;

class TransaccionServicesController extends FOSRestController
{



	
	/**
	* @Rest\Get("/transacciones")
	*/
	public function getAction()
	{
		$resultset = $this->getDoctrine()->getRepository("AppBundle:Transaccion")->verTodos();
		if ($resultset == null) {
          return new View("No hay transacciones para mostrar", Response::HTTP_NOT_FOUND);
     }
        return $resultset;
	}


	/**
	* @Rest\Get("/transacciones/{numTransaccion}")
	*/
	public function numAction($numTransaccion)
	{
		$resultset = $this->getDoctrine()->getRepository("AppBundle:CuentaBancaria")->getCuentas($numTransaccion);
		if ($resultset == null) {
          return new View("No existe esa cuenta", Response::HTTP_NOT_FOUND);
     }
        return $resultset;
	}





	/**
 	* @Rest\Post("/transacciones")
 	*/
 	public function postAction(Request $request){
 		$em = $this->getDoctrine()->getManager();
 		$transaccion = new Transaccion;
 		$data = json_decode($request->getContent(), true);
 		$transaccion->setTipoTransaccion($data["tipo"]);
 		$transaccion->setCuentaBancaria($data["cuenta"]);
 		$transaccion->setProveedor($data["proveedor"]);
 		$transaccion->setMonto($data["monto"]);
 	
 		$em->persist($transaccion);
 		$em->flush();
 		return new View("Transaccion agregada exitosamente", Response::HTTP_OK);

 	}




}
?>