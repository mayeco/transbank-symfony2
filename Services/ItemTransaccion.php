<?php

namespace rotvulpix\Symfony\TransbankBundle\Services;

class ItemTransaccion
{
	// Definición de Propiedades
	private $cantidad, $unitario, $nombre;

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
}
