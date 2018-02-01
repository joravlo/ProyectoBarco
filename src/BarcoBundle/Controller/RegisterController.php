<?php

namespace BarcoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use BarcoBundle\Entity\Usuario;
use BarcoBundle\Form\UsuarioType;
use Symfony\Component\HttpFoundation\Request;

class RegisterController extends Controller
{
  public function registerAction(Request $request)
  {
      // 1) build the form
      $user = new Usuario();
      $form = $this->createForm(UsuarioType::class, $user);
      

      // 2) handle the submit (will only happen on POST)
      $form->handleRequest($request);
      if ($form->isSubmitted() && $form->isValid()) {

          // 3) Encode the password (you could also do this via Doctrine listener)
          $password = $this->get('security.password_encoder')
          ->encodePassword($user, $user->getPlainPassword());
          $user->setPassword($password);
          $roles = ["ROLE_USER"];
          $user->setRoles($roles);

          // 4) save the User!
          $em = $this->getDoctrine()->getManager();
          $em->persist($user);
          $em->flush();

          return $this->redirectToRoute('barco_homepage');
      }

      return $this->render(
          'BarcoBundle:Default:register.html.twig',
          array('form' => $form->createView())
      );
  }

  public function profileAction()
  {
      return $this->render('BarcoBundle:Default:profile.html.twig');
  }

  public function loginAction(Request $request)
  {
    $authenticationUtils = $this->get('security.authentication_utils');
    // get the login error if there is one
    $error = $authenticationUtils->getLastAuthenticationError();

    // last username entered by the user
    $lastUsername = $authenticationUtils->getLastUsername();

    return $this->render('BarcoBundle:Default:login.html.twig', array(
        'last_username' => $lastUsername,
        'error'         => $error,
    ));
  }
}
