<?php

namespace rotvulpix\Symfony\TransbankBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use rotvulpix\Symfony\TransbankBundle\Services\ItemTransaccion;
use rotvulpix\Symfony\TransbankBundle\Services\Transaccion;
use rotvulpix\Symfony\TransbankBundle\Entity\WebPayLog;
class WebPayController extends Controller
{
    public function CheckoutAction($transaccion)
    {
        // Entity Manager
        $em = $this->getDoctrine()->getManager();

        // Creación de Log
        $log = new WebPayLog();
        $log->setTipoTransaccion(WebPayLog::TR_NORMAL);
        $log->setOrdenCompra(uniqid());
        $log->setSesion(uniqid());
        $log->setMonto($transaccion->getTotalTransaccion());
        $log->setEstado(WebPayLog::EnProceso);
        $log->setFechaInicioTransaccion(new \Datetime());
        $em->persist($log);
        $em->flush();

        // Parámetros para POST
        $parametros['transaccion'] = $transaccion;
        $parametros['tipo'] = WebPayLog::$tipos[WebPayLog::TR_NORMAL];
        $parametros['idSesion'] = $log->getSesion();
        $parametros['ordenCompra'] = $log->getOrdenCompra();

        // Render!
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
        try {

            // Entity Manager
            $em = $this->getDoctrine()->getManager();

            // Parámetros para Búsqueda de Transacción
            $param = Array(
                'ordenCompra' => $_POST['TBK_ORDEN_COMPRA'],
                'sesion' => $_POST['TBK_ID_SESION'],
                'monto' => $_POST['TBK_MONTO'] / 100
                );
            
            // Búsqueda de Transacción en DB
            $logTransaccion = $em->getRepository('rotvulpixSymfonyTransbankBundle:WebPayLog')->findOneBy($param);
            if(!$logTransaccion) { throw new \Exception("No Existe Log de Transacción - " . json_encode($param)); }

            // Verificar Timeout
            $transaccion = $logTransaccion->getFechaInicioTransaccion();
            $ahora = new \DateTime();
            $diferencia = $ahora->getTimeStamp() - $transaccion->getTimeStamp();
            if($diferencia > 600) { throw new \Exception("Timeout de 10min Excedido - " . json_encode($param)); }

            // Parámetros
            $rutaCGI = $this->container->getParameter('cgi_transbank');
            $rutaTXT = $rutaCGI . "log/log" . $_POST['TBK_ID_TRANSACCION'] . ".txt";

            // Generar MAC para Chequeo
            reset($_POST);
            $string = '';
            while (list($key, $val) = each($_POST))
            { $string .= $key . '=' . $val . '&'; }
            file_put_contents($rutaTXT, $string);

            // Chequeo MAC
            $cmd = $rutaCGI . 'tbk_check_mac.cgi ' . $rutaTXT;
            $exec = trim(shell_exec($cmd));
            if($exec !== "CORRECTO") { throw new \Exception("Error en chequeo de MAC - " . $cmd); }

            // Actualizar Información
            $logTransaccion->setEstado(WebPayLog::AceptadoPagado);
            $logTransaccion->setRespuesta($_POST[ 'TBK_RESPUESTA' ]);
            $logTransaccion->setCodigoAutorizacion($_POST['TBK_CODIGO_AUTORIZACION']);
            $logTransaccion->setNumeroTarjeta($_POST['TBK_FINAL_NUMERO_TARJETA']);
            $logTransaccion->setTransaccion($_POST['TBK_ID_TRANSACCION']);
            $logTransaccion->setTipoPago($_POST['TBK_TIPO_PAGO']);
            $logTransaccion->setCuotas($_POST['TBK_NUMERO_CUOTAS']);
            $logTransaccion->setVci($_POST['TBK_VCI']);
            $logTransaccion->setMac($_POST['TBK_MAC']);

            // Fechas
            $fechaContable = \Datetime::createFromFormat("md", $_POST['TBK_FECHA_CONTABLE']);
            $fechaTransaccion = \Datetime::createFromFormat("mdHis", $_POST['TBK_FECHA_TRANSACCION'] . $_POST['TBK_HORA_TRANSACCION']);
            $logTransaccion->setFechaContable($fechaContable);
            $logTransaccion->setFechaTransaccion($fechaTransaccion);

            $em->persist($logTransaccion);
            $em->flush();
            
            
            // Ha Pasado todos los Filtros  
            return new Response('ACEPTADO');

        } catch (\Exception $e) {
            $rutaERR = $this->container->getParameter('cgi_transbank') . "log/error/";
            $fileERR = $rutaERR . uniqid() . '.txt';
            file_put_contents($fileERR, $e->getMessage());

            // Retornar Rechazo
            return new Response('RECHAZADO');
        }
    }
}
