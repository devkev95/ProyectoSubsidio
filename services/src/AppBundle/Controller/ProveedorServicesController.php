<?php


namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\View\View;
use AppBundle\Entity\Proveedor;
use AppBundle\Entity\CuentaBancaria;

class ProveedorServicesController extends FOSRestController{





	
	/**
	* @Rest\Get("/proveedor")
	*/
	public function getAction(){
		$resultset = $this->getDoctrine()->getRepository("AppBundle:Proveedor")->verTodos();
		if ($resultset == null) {
          return new View("No hay proveedores registrados en el sistema", Response::HTTP_NOT_FOUND);
     }
        return $resultset;
	}


	/**
	* @Rest\Get("/proveedor/{numRegistro}")
	*/
	public function idAction($numRegistro){
		$singleresult = $this->getDoctrine()->getRepository("AppBundle:Proveedor")->find($numRegistro);
   		if ($singleresult == null) {
   			return new View("No existe ese proveedor", Response::HTTP_NOT_FOUND);
  		 }	
 		return $singleresult;
 	}

 	/**
 	* @Rest\Post("/proveedor")
 	*/
 	public function postAction(Request $request){
 		$em = $this->getDoctrine()->getManager();
 		$proveedor = new Proveedor;
 		$data = json_decode($request->getContent(), true);
 		$proveedor->setNumRegistro($data["numRegistro"]);
 		$proveedor->setNombreProveedor($data["nombreProveedor"]);
 		$proveedor->setDireccion($data["direccion"]);
 		$proveedor->setTelefono($data["telefono"]);
 		$proveedor->setCorreoContacto($data["correoContacto"]);
 		$proveedor->setEstado($data["estado"]);
 		foreach ($data["cuentas"] as $cuenta) {
 			$proveedor->addCuenta($em->getReference("AppBundle:CuentaBancaria", $cuenta));
 		}
 		$em->persist($proveedor);
 		$em->flush();
 		return new View("Proveedor agregado exitosamente", Response::HTTP_OK);

 	}

 	/**
 	* @Rest\Put("/proveedor/{numRegistro}")
 	*/
 	public function putAction($numRegistro, Request $request){
 		$proveedor= $this->getDoctrine()->getRepository("AppBundle:Proveedor")->find($numRegistro);
 		$data = json_decode($request->getContent(), true);
 		if (isset($data["nombreProveedor"])) {
 			$proveedor->setNombreProveedor($data["nombreProveedor"]);
 		}
 		if (isset($data["direccion"])) {
 			$proveedor->setDireccion($data["direccion"]);
 		}
 		if (isset($data["telefono"])) {
 			$proveedor->setTelefono($data["telefono"]);
 		}
 		if (isset($data["correoContacto"])) {
 			$proveedor->setCorreoContacto($data["correoContacto"]);
 		}
 		if (isset($data["estado"])) {
 			$proveedor->setEstado($data["estado"]);
 		}
 		$cuentasNuevas = $this->getDoctrine()->getRepository("AppBundle:CuentaBancaria")->getCuentas($data["cuentas"]);
 		$cuentasViejas = $proveedor->getCuentas();
 		foreach ($cuentasViejas as $id => $cuenta) {
 			if(!isset($cuentasNuevas[$id])){
 				$proveedor->removeCuenta($cuenta);
 			}else{
 				unset($cuentasNuevas[$id]);
 			}	
 		}
 		foreach ($cuentasNuevas as $id => $cuenta) {
 			$proveedor->addCuenta($cuenta);
 		}

 		$this->getDoctrine()->getManager()->flush();
 		return new View("Proveedor modificado exitosamente", Response::HTTP_OK);

 	}

 	/**
 	* @Rest\Delete("proveedor/{numRegistro}")
 	*/
 	public function deleteAction($numRegistro){
 		$proveedor = $this->getDoctrine()->getRepository("AppBundle:Proveedor")->find($numRegistro);
 		$this->getDoctrine()->getManager()->remove($proveedor);
 		$this->getDoctrine()->getManager()->flush();
 		return new View("Borrado exitosamente", Response::HTTP_OK);
 	}

}
?>