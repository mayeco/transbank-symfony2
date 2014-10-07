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
	const EnProceso = 1;
	const Aceptado = 2;
	const AceptadoPagado= 3;
	const Rechazado = 4;

	const TR_NORMAL = 1;

	public static $tipos = Array(1 => 'TR_NORMAL');
	public static $estados = Array(1 => 'En Proceso', 2 => 'Aceptado', 3 => 'Aceptado-Pagado', 4 => 'Rechazado');

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
	protected $sesion;

	/**
	 * @ORM\Column(type="integer", length=1)
	 */
	protected $estado;

	/**
	 * @ORM\Column(type="integer", nullable=true, length=2)
	 */
	protected $respuesta;

	/**
	 * @ORM\Column(type="string", length=6, nullable=true)
	 */
	protected $codigoAutorizacion;

	/**
	 * @ORM\Column(type="integer", nullable=true, length=4)
	 */
	protected $numeroTarjeta;

	/**
	 * @ORM\Column(type="datetime", nullable=true)
	 */
	protected $fechaContable;

	/**
	 * @ORM\Column(type="datetime", nullable=true)
	 */
	protected $fechaTransaccion;

	/**
	 * @ORM\Column(type="datetime")
	 */
	protected $fechaInicioTransaccion;

	/**
	 * @ORM\Column(type="integer", length=20, nullable=true)
	 */
	protected $transaccion;

	/**
	 * @ORM\Column(type="string", length=2, nullable=true)
	 */
	protected $tipoPago;

	/**
	 * @ORM\Column(type="integer", nullable=true, length=2)
	 */
	protected $cuotas;

	/**
	 * @ORM\Column(type="string", length=3, nullable=true)
	 */
	protected $vci;

	/**
	 * @ORM\Column(type="string", length=255, nullable=true)
	 */
	protected $mac;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set tipoTransaccion
     *
     * @param integer $tipoTransaccion
     * @return WebPayLog
     */
    public function setTipoTransaccion($tipoTransaccion)
    {
        $this->tipoTransaccion = $tipoTransaccion;

        return $this;
    }

    /**
     * Get tipoTransaccion
     *
     * @return integer 
     */
    public function getTipoTransaccion()
    {
        return $this->tipoTransaccion;
    }

    /**
     * Set monto
     *
     * @param integer $monto
     * @return WebPayLog
     */
    public function setMonto($monto)
    {
        $this->monto = $monto;

        return $this;
    }

    /**
     * Get monto
     *
     * @return integer 
     */
    public function getMonto()
    {
        return $this->monto;
    }

    /**
     * Set ordenCompra
     *
     * @param string $ordenCompra
     * @return WebPayLog
     */
    public function setOrdenCompra($ordenCompra)
    {
        $this->ordenCompra = $ordenCompra;

        return $this;
    }

    /**
     * Get ordenCompra
     *
     * @return string 
     */
    public function getOrdenCompra()
    {
        return $this->ordenCompra;
    }

    /**
     * Set sesion
     *
     * @param string $sesion
     * @return WebPayLog
     */
    public function setSesion($sesion)
    {
        $this->sesion = $sesion;

        return $this;
    }

    /**
     * Get sesion
     *
     * @return string 
     */
    public function getSesion()
    {
        return $this->sesion;
    }

    /**
     * Set estado
     *
     * @param integer $estado
     * @return WebPayLog
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get estado
     *
     * @return integer 
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set respuesta
     *
     * @param integer $respuesta
     * @return WebPayLog
     */
    public function setRespuesta($respuesta)
    {
        $this->respuesta = $respuesta;

        return $this;
    }

    /**
     * Get respuesta
     *
     * @return integer 
     */
    public function getRespuesta()
    {
        return $this->respuesta;
    }

    /**
     * Set codigoAutorizacion
     *
     * @param string $codigoAutorizacion
     * @return WebPayLog
     */
    public function setCodigoAutorizacion($codigoAutorizacion)
    {
        $this->codigoAutorizacion = $codigoAutorizacion;

        return $this;
    }

    /**
     * Get codigoAutorizacion
     *
     * @return string 
     */
    public function getCodigoAutorizacion()
    {
        return $this->codigoAutorizacion;
    }

    /**
     * Set numeroTarjeta
     *
     * @param integer $numeroTarjeta
     * @return WebPayLog
     */
    public function setNumeroTarjeta($numeroTarjeta)
    {
        $this->numeroTarjeta = $numeroTarjeta;

        return $this;
    }

    /**
     * Get numeroTarjeta
     *
     * @return integer 
     */
    public function getNumeroTarjeta()
    {
        return $this->numeroTarjeta;
    }

    /**
     * Set fechaContable
     *
     * @param \DateTime $fechaContable
     * @return WebPayLog
     */
    public function setFechaContable($fechaContable)
    {
        $this->fechaContable = $fechaContable;

        return $this;
    }

    /**
     * Get fechaContable
     *
     * @return \DateTime 
     */
    public function getFechaContable()
    {
        return $this->fechaContable;
    }

    /**
     * Set fechaTransaccion
     *
     * @param \DateTime $fechaTransaccion
     * @return WebPayLog
     */
    public function setFechaTransaccion($fechaTransaccion)
    {
        $this->fechaTransaccion = $fechaTransaccion;

        return $this;
    }

    /**
     * Get fechaTransaccion
     *
     * @return \DateTime 
     */
    public function getFechaTransaccion()
    {
        return $this->fechaTransaccion;
    }

    /**
     * Set fechaInicioTransaccion
     *
     * @param \DateTime $fechaInicioTransaccion
     * @return WebPayLog
     */
    public function setFechaInicioTransaccion($fechaInicioTransaccion)
    {
        $this->fechaInicioTransaccion = $fechaInicioTransaccion;

        return $this;
    }

    /**
     * Get fechaInicioTransaccion
     *
     * @return \DateTime 
     */
    public function getFechaInicioTransaccion()
    {
        return $this->fechaInicioTransaccion;
    }

    /**
     * Set transaccion
     *
     * @param integer $transaccion
     * @return WebPayLog
     */
    public function setTransaccion($transaccion)
    {
        $this->transaccion = $transaccion;

        return $this;
    }

    /**
     * Get transaccion
     *
     * @return integer 
     */
    public function getTransaccion()
    {
        return $this->transaccion;
    }

    /**
     * Set tipoPago
     *
     * @param string $tipoPago
     * @return WebPayLog
     */
    public function setTipoPago($tipoPago)
    {
        $this->tipoPago = $tipoPago;

        return $this;
    }

    /**
     * Get tipoPago
     *
     * @return string 
     */
    public function getTipoPago()
    {
        return $this->tipoPago;
    }

    /**
     * Set cuotas
     *
     * @param integer $cuotas
     * @return WebPayLog
     */
    public function setCuotas($cuotas)
    {
        $this->cuotas = $cuotas;

        return $this;
    }

    /**
     * Get cuotas
     *
     * @return integer 
     */
    public function getCuotas()
    {
        return $this->cuotas;
    }

    /**
     * Set vci
     *
     * @param string $vci
     * @return WebPayLog
     */
    public function setVci($vci)
    {
        $this->vci = $vci;

        return $this;
    }

    /**
     * Get vci
     *
     * @return string 
     */
    public function getVci()
    {
        return $this->vci;
    }

    /**
     * Set mac
     *
     * @param string $mac
     * @return WebPayLog
     */
    public function setMac($mac)
    {
        $this->mac = $mac;

        return $this;
    }

    /**
     * Get mac
     *
     * @return string 
     */
    public function getMac()
    {
        return $this->mac;
    }
}
