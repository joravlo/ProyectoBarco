<?php

namespace BarcoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('BarcoBundle:Default:index.html.twig');
    }
}
