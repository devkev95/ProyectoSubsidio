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
	* @Rest\Get("/usuario/{email}")
	*/

 
	public function idAction($email){

   		$singleresult = $this->getDoctrine()->getRepository("AppBundle:Usuario")->usuarioId($email);
   		if ($singleresult == null) {
   			return new View("No existe ese usario", Response::HTTP_NOT_FOUND);
  		 }	
 		return $singleresult;
 	}

 	/**
	* @Rest\Post("/usuario")
	*/

 public function createAction(Request $request)
{
    $em = $this->getDoctrine()->getManager();
    $usuario = new Usuario();
    $data = json_decode($request->getContent(), true);
    $usuario->setEmail($data["email"]);
    $usuario->setPassword($data["password"]);
    $usuario->setNombre($data["nombres"]);
    $usuario->setApellidos($data["apellidos"]);
    $usuario->setEstado($data["activo"]);
    $roles = $em->getRepository("AppBundle:Rol")->getRoles($data["rolId"]);
 		foreach ($roles as $rol) {
 			$usuario->addRol($rol);
 		}
    $em->persist($product);
    $em->flush();

   

    return new Response('Se creo el Usuario con Email: '.$usuario->getEmail());
}




}
?>