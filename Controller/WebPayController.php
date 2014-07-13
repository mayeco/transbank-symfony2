<?php

namespace rotvulpix\Symfony\TransbankBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use rotvulpix\Symfony\TransbankBundle\Services\ItemTransaccion;
use rotvulpix\Symfony\TransbankBundle\Services\Transaccion;

class WebPayController extends Controller
{
    public function CheckoutAction($transaccion)
    {
    	$parametros['transaccion'] = $transaccion;
        return $this->render('rotvulpixSymfonyTransbankBundle:WebPay:checkout.html.twig', $parametros);
    }

    public function ExitoAction()
    {
        // Nuevo Ítem de Transacción
        $transaccion = new Transaccion();

        // Ítems
        $manzanas = new ItemTransaccion(3990, 'Caja de Manzanas', 4);

        // Agregar Ítems
        $transaccion->addItem($manzanas);

        // Añadimos Transacción al Render
        $parametros['transaccion'] = $transaccion;

        // Render
        return $this->render('rotvulpixSymfonyTransbankBundle:WebPay:exito.html.twig', $parametros);
        
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
