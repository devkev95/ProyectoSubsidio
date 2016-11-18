<?php


namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use FOS\RestBundle\View\View;
use AppBundle\Entity\Usuario;
use AppBundle\Entity\Rol;
use AppBundle\Entity\RecUsuario;

class UsuarioServicesController extends FOSRestController{
	
	/**
	* @Rest\Get("/usuario")
    * @Security("has_role('ROLE_ADMIN')")
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
    * @Security("has_role('ROLE_ADMIN')")
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
        try {
            $em = $this->getDoctrine()->getManager();
            $usuario = new Usuario();
            $data = json_decode($request->getContent(), true);
        
            $usuario->setEmail($data["email"]);
            $password = $this->container->get('security.password_encoder')->encodePassword($usuario, $data["password"]);
            $usuario->setPassword($password);
            $usuario->setNombre($data["nombres"]);
            $usuario->setApellidos($data["apellidos"]);
            $usuario->setEstado($data["activo"]);
            $rol = $em->getRepository("AppBundle:Rol")->getRol($data["rol"]);
            $usuario->setRol($rol);
            $em->persist($usuario);
            $em->flush();

            return new Response('Se creo el Usuario con Email: '.$usuario->getEmail());
        } catch (\Doctrine\DBAL\Exception\UniqueConstraintViolationException $e){
            return $this->view(array('response' => 'Usuario ya existente. Por favor intente con otro'), 400);   
        } catch (\Exception $e){
            return $this->view(array('response' => 'Ha sucedido un error en la base de datos. Por favor intente más tarde'), 400); 
        }
    }


    /**
    * @Rest\Put("/usuario/{email}")
    * @Security("has_role('ROLE_ADMIN')")
    */
    public function putAction($email, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $usuarioU = $em->getRepository('AppBundle:Usuario')->usuarioId($email);
        $data = json_decode($request->getContent(), true);

        if (!$usuarioU) {
            throw $this->createNotFoundException(
                'Usuario no encontrado'.$email
            );
        }
        if (isset($data["password"])) {
          $usuarioU->setPassword($data["password"]);
        }

         $this->getDoctrine()->getManager()->flush();
        return new View("Usuario modificado exitosamente", Response::HTTP_OK);

    }

    /**
    * @Rest\Post("/login")
    */
    public function login(Request $request){
        $data = json_decode($request->getContent(), true);
        $email = $data["email"];
        $password = $data["password"];

        $user = $this->getDoctrine()->getRepository("AppBundle:Usuario")->usuarioId($email);
        if(!$user) {
            return $this->view(array('response' =>"Usuario inexistente"), 401);
        }

        if(!$this->get('security.password_encoder')->isPasswordValid($user, $password)) {
            return $this->view(array('response' =>"Usuario o contraseña incorrecta"), 401);
        }

        $token = $this->get('lexik_jwt_authentication.encoder')
            ->encode(['email' => $user->getEmail(), "role"=>$user->getRoles()]);

        // Return genereted tocken
        return $this->view(array('token' => $token, 'nombre' => $user->getNombre()." ".$user->getApellidos(), 'rol' => $user->getRol()->getNombre()), 200);

    }




}
?>