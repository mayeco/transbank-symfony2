<?php

namespace rotvulpix\Symfony\TransbankBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('rotvulpixSymfonyTransbankBundle:Default:index.html.twig', array('name' => $name));
    }
}
