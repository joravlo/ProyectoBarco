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
        return $this->render('BarcoBundle:Default:barcos.html.twig');
    }
    public function barcosDetalleAction()
    {
        return $this->render('BarcoBundle:Default:barcosDetalle.html.twig');
    }
    public function amarresAction()
    {
        return $this->render('BarcoBundle:Default:amarres.html.twig');
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
