<?php

namespace BarcoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BarcoController extends Controller
{
    public function barcosAction()
    {
      $repository = $this->getDoctrine()->getRepository('BarcoBundle:Barco');
      $barcos = $repository->findAll();

        return $this->render('BarcoBundle:Default:barcos.html.twig',array('barcos'=>$barcos));
    }
    public function barcosDetalleAction($idBarco)
    {
      $repository = $this->getDoctrine()->getRepository('BarcoBundle:Barco');
      $barco = $repository->find($idBarco);

        return $this->render('BarcoBundle:Default:barcosDetalle.html.twig',array('barco'=>$barco));
    }
    public function barcosMotorAction()
    {
      $repository = $this->getDoctrine()->getRepository('BarcoBundle:Barco');
      //Buscamos los barocs que tengan un tipo motor
      $barcos = $repository->findByTipo("Motor");

      //Pasamos el array de barcos a la pagina donde se mostrarán
        return $this->render('BarcoBundle:Default:barcosMotor.html.twig',array('barcos'=>$barcos));
    }
}
