<?php

namespace rotvulpix\Symfony\TransbankBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DemoController extends Controller
{
    public function CompraAction()
    {
    	$parametros['monto'] = 3400;
        return $this->render('rotvulpixSymfonyTransbankBundle:Demo:compra.html.twig', $parametros);
    }
}
