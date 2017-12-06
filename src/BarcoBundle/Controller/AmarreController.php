<?php

namespace BarcoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AmarreController extends Controller
{
  public function amarresAction()
  {
    $repository = $this->getDoctrine()->getRepository('BarcoBundle:Amarre');
    $amarres = $repository->findAll();
      return $this->render('BarcoBundle:Default:amarres.html.twig',array('amarres'=>$amarres));
  }
  public function amarresDetalleAction($idAmarre)
  {
    $repository = $this->getDoctrine()->getRepository('BarcoBundle:Amarre');
    $amarre = $repository->find($idAmarre);
      return $this->render('BarcoBundle:Default:amarresDetalle.html.twig',array('amarre'=>$amarre));
  }
}
