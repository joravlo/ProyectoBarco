<?php

namespace BarcoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AccesorioController extends Controller
{
  public function accesoriosAction()
  {
    $repository = $this->getDoctrine()->getRepository('BarcoBundle:Accesorio');
    $accesorios = $repository->findAll();

      return $this->render('BarcoBundle:Default:accesorios.html.twig',array('accesorios'=>$accesorios));
  }
  public function accesoriosDetalleAction($idAccesorio)
  {
    $repository = $this->getDoctrine()->getRepository('BarcoBundle:Accesorio');
    $accesorio = $repository->find($idAccesorio);

      return $this->render('BarcoBundle:Default:accesoriosDetalle.html.twig',array('accesorio'=>$accesorio));
  }
}
