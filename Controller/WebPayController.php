<?php

namespace rotvulpix\Symfony\TransbankBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class WebPayController extends Controller
{
    public function CheckoutAction($transaccion)
    {
    	$parametros['transaccion'] = $transaccion;
        return $this->render('rotvulpixSymfonyTransbankBundle:WebPay:checkout.html.twig', $parametros);
    }

    public function ExitoAction()
    {
        return $this->render('rotvulpixSymfonyTransbankBundle:WebPay:exito.html.twig');
    }

    public function FracasoAction()
    {
        return $this->render('rotvulpixSymfonyTransbankBundle:WebPay:fracaso.html.twig');
    }

    public function CierreAction()
    {
        return new Response('ACEPTADO');
    }
}
