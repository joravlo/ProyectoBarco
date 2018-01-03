<?php

namespace BarcoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use BarcoBundle\Entity\Barco;
use BarcoBundle\Entity\Usuario;
use BarcoBundle\Form\BarcoType;
use Symfony\Component\HttpFoundation\Request;

class BarcoController extends Controller
{
    public function barcosAction()
    {
      $repository = $this->getDoctrine()->getRepository('BarcoBundle:Barco');
      $barcos = $repository->findAll();

        return $this->render('BarcoBundle:BarcoViews:barcos.html.twig',array('barcos'=>$barcos));
    }
    public function barcosDetalleAction($idBarco)
    {
      $repository = $this->getDoctrine()->getRepository('BarcoBundle:Barco');
      $barco = $repository->find($idBarco);

        return $this->render('BarcoBundle:BarcoViews:barcosDetalle.html.twig',array('barco'=>$barco));
    }
    public function barcosMotorAction()
    {
      $repository = $this->getDoctrine()->getRepository('BarcoBundle:Barco');
      //Buscamos los barocs que tengan un tipo motor
      $barcos = $repository->findByTipo("Motor");

      //Pasamos el array de barcos a la pagina donde se mostrarán
        return $this->render('BarcoBundle:BarcoViews:barcosMotor.html.twig',array('barcos'=>$barcos));
    }
    public function addBarcosAction(Request $request)
    {
      $repository = $this->getDoctrine()->getRepository('BarcoBundle:Usuario');
      $em = $this->getDoctrine()->getManager();
      $barco = new Barco();

      $form = $this->createForm(BarcoType::class);

      $form->handleRequest($request);

      if ($form->isSubmitted() && $form->isValid()) {
        //Buscamos el usuario con id 1 de momento hasta que se pueda hacer login
          $usuario = $repository->find(1);
          $barco = $form->getData();
          //Añadimos el usuario al que pertenece el barco
          $barco->setUsuario($usuario);

          $em = $this->getDoctrine()->getManager();
          $em->persist($barco);
          $em->flush();

          return $this->redirect($this->generateUrl('barco_detalle', array('idBarco' => $barco->getId())));

      }

      return $this->render('BarcoBundle:BarcoViews:addBarco.html.twig',array('form'=> $form->createView()));
    }

    public function actualizarBarcoAction(Request $request, $idBarco)
    {
      $em = $this->getDoctrine()->getManager();
      $barco = $em->getRepository(Barco::Class)->find($idBarco);
      $form = $this->createForm(BarcoType::class, $barco);

      $form->handleRequest($request);
    if ($form->isSubmitted() && $form->isValid()) {

        $barco = $form->getData();
        $em->persist($barco);
        $em->flush();
        return $this->redirect($this->generateUrl('barco_detalle', array('idBarco' => $barco->getId())));
    }

      return $this->render('BarcoBundle:BarcoViews:actualizarBarco.html.twig',array('form'=> $form->createView()));
    }
}
