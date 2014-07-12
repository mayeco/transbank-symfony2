<?php

namespace rotvulpix\Symfony\TransbankBundle\Services;

class ItemTransaccion
{
	// Definición de Propiedades
	private $cantidad, $unitario, $nombre;

	// Definición por defecto. Cantidad por defecto = 1
	function __construct($unitario, $nombre, $cantidad = 1) {
		$this->cantidad = $cantidad;
		$this->unitario = $unitario;
		$this->nombre = $nombre;
	}
	
	// Obtener Cantidad de Ítems
	public function getCantidad() {
		return $this->cantidad;
	}

	// Obtener Precio Unitario
	public function getUnitario() {
		return $this->unitario;
	}

	// Obtener Nombre de Ítem
	public function getNombre() {
		return $this->nombre;
	}

	// Obtener Precio Total
	public function getTotalItem() {
		return $this->cantidad * $this->unitario;
	}

	// Setear Cantidad
	public function setCantidad($cantidad) {
		$this->cantidad = $cantidad;
	}

	// Setear Precio Unitario
	public function setUnitario($unitario) {
		$this->unitario = $unitario;
	}

	// Setear Nombre
	public function setNombre($nombre) {
		$this->nombre = $nombre;
	}
}
