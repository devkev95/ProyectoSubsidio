<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\View\View;
use AppBundle\Entity\Abono;
use AppBundle\Entity\CuentaBancaria;
use AppBundle\Entity\PresupuestoAnual;
use AppBundle\Repository;

class AbonoServicesController extends FOSRestController
{



	
	/**
	* @Rest\Get("/abonos")
	*/
	public function getAction()
	{
		$resultset = $this->getDoctrine()->getRepository("AppBundle:Abono")->verTodos();
		if ($resultset == null) {
          return new View("No hay abonos para mostrar", Response::HTTP_NOT_FOUND);
     }
        return $resultset;
	}



	/**
 	* @Rest\Post("/abonos")
 	*/
 	public function postAction(Request $request){
 		$em = $this->getDoctrine()->getManager();
 		$abono = new Abono;
 		$data = json_decode($request->getContent(), true);
 		
 		$abono->setCuentaBancaria($em->getReference("AppBundle:CuentaBancaria", $data["cuenta"]));
 		
 		$abono->setMontoAbono($data["monto"]);

 		$em->persist($abono);
 	    $em->flush();
 	    return new View("Abono realizado exitosamente", Response::HTTP_OK);
 			

 


}
}

?>