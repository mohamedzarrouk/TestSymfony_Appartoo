<?php

namespace CarnetAdresse\InsecteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('CarnetAdresseInsecteBundle:Default:index.html.twig');
    }
}
