<?php


namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\View\View;
use AppBundle\Entity\Usuario;
use AppBundle\Entity\Rol;
use AppBundle\Entity\RecUsuario;

class UsuarioServicesController extends FOSRestController{
	
	/**
	* @Rest\Get("/usuario")
	*/
	public function getAction(){
		$resultset = $this->getDoctrine()->getRepository("AppBundle:Usuario")->verTodosUsuarios();
		if ($resultset == null) {
          return new View("No hay usuarios en la base", Response::HTTP_NOT_FOUND);
     }
        return $resultset;
	}


	/**
	* @Rest\Get("/proveedor/{numRegistro}")
	

 
	public function idAction($numRegistro){

   		$singleresult = $this->getDoctrine()->getRepository("AppBundle:Proveedor")->find($numRegistro);
   		if ($singleresult == null) {
   			return new View("No existe ese proveedor", Response::HTTP_NOT_FOUND);
  		 }	
 		return $singleresult;
 }*/



}
?>