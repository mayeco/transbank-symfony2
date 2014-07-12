<?php

namespace rotvulpix\Symfony\TransbankBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use rotvulpix\Symfony\TransbankBundle\Services\ItemTransaccion;
use rotvulpix\Symfony\TransbankBundle\Services\Transaccion;
class DemoController extends Controller
{
    public function CompraAction()
    {

    	$transaccion = new Transaccion();

    	// Ítems
    	$manzanas = new ItemTransaccion(3990, 'Caja de Manzanas', 4);

    	// Agregar Ítems
    	$transaccion->addItem($manzanas);

    	$parametros['transaccion'] = $transaccion;
        return $this->render('rotvulpixSymfonyTransbankBundle:Demo:compra.html.twig', $parametros);
    }
}
