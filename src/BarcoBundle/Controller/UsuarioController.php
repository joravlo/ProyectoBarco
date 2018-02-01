<?php

namespace BarcoBundle\Controller;
use BarcoBundle\Form\UsuarioWithoutPassType;
use BarcoBundle\Entity\Usuario;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class UsuarioController extends Controller
{
  public function showUsersAction()
  {
    $repository = $this->getDoctrine()->getRepository('BarcoBundle:Usuario');
    $usuarios = $repository->findAll();

      return $this->render('BarcoBundle:Default:users.html.twig',array('usuarios'=>$usuarios));
  }

  public function userUpdateAction(Request $request, $idUser)
  {
    $em = $this->getDoctrine()->getManager();
    $usuario = $em->getRepository(Usuario::Class)->find($idUser);
    $form = $this->createForm(UsuarioWithoutPassType::class, $usuario);

    $form->handleRequest($request);
  if ($form->isSubmitted() && $form->isValid()) {

      $usuario = $form->getData();
      $em->persist($usuario);
      $em->flush();
      return $this->redirect($this->generateUrl('show_users'));
  }

    return $this->render('BarcoBundle:Default:updateUser.html.twig',array('idUser' => $usuario->getId() ,'form'=> $form->createView()));
  }

  public function userDeleteAction($idUser)
  {
    $em = $this->getDoctrine()->getManager();
    $user = $em->getRepository(Usuario::Class)->find($idUser);
    $em->remove($user);
    $em->flush();

    return $this->redirectToRoute('show_users');
  }
}
