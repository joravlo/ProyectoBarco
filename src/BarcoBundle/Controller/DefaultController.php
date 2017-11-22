<?php

namespace BarcoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('BarcoBundle:Default:index.html.twig');
    }
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
    public function amarresAction()
    {
      $repository = $this->getDoctrine()->getRepository('BarcoBundle:Amarre');
      $amarres = $repository->findAll();
        return $this->render('BarcoBundle:Default:amarres.html.twig',array('amarres'=>$amarres));
    }
    public function amarresDetalleAction()
    {
        return $this->render('BarcoBundle:Default:amarresDetalle.html.twig');
    }
    public function accesoriosAction()
    {
        return $this->render('BarcoBundle:Default:accesorios.html.twig');
    }
    public function accesoriosDetalleAction()
    {
        return $this->render('BarcoBundle:Default:accesoriosDetalle.html.twig');
    }
}
