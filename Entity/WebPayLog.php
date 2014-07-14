<?php

namespace rotvulpix\Symfony\TransbankBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="WebPayLog")
 */
class WebPayLog {

	// Estados predeterminados de Transacción
	private $estados = Array(1 => 'En Proceso', 2 => 'Aceptado', 3 => 'Aceptado-Pagado', 4 => 'Rechazado');

	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue
	 */
	protected $id = null;

	/**
	 * @ORM\Column(type="integer")
	 */
	protected $tipoTransaccion = 1;

	/**
	 * @ORM\Column(type="integer")
	 */
	protected $monto;

	/**
	 * @ORM\Column(type="string", length=255)
	 */
	protected $ordenCompra;
	
	/**
	 * @ORM\Column(type="string", length=255)
	 */
	protected $idSesion;

	/**
	 * @ORM\Column(type="integer")
	 */
	protected $estado;

	/**
	 * @ORM\Column(type="integer")
	 */
	protected $respuesta;

	/**
	 * @ORM\Column(type="string", length=255)
	 */
	protected $codigoAutorizacion;

	/**
	 * @ORM\Column(type="integer")
	 */
	protected $numeroTarjeta;

	/**
	 * @ORM\Column(type="datetime")
	 */
	protected $fechaContable;

	/**
	 * @ORM\Column(type="datetime")
	 */
	protected $fechaTransaccion;

	/**
	 * @ORM\Column(type="string", length=255)
	 */
	protected $idTransaccion;

	/**
	 * @ORM\Column(type="string", length=255)
	 */
	protected $idTipoPago;

	/**
	 * @ORM\Column(type="integer")
	 */
	protected $cuotas;

	/**
	 * @ORM\Column(type="string", length=255)
	 */
	protected $vci;

	/**
	 * @ORM\Column(type="string", length=255)
	 */
	protected $mac;
}