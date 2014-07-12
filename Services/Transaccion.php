<?php

namespace rotvulpix\Symfony\TransbankBundle\Services;

class Transaccion
{
	// Definición de Propiedades
	private $items = Array();

	// Obtenemos Total de Transacción
	function getTotalTransaccion() {
		$suma = 0;

		// Por cada Ítem
		foreach($this->items as $item) {

			// Añadimos Total del Ítem
			$suma += $item->getTotalItem();
		}

		// Retornamos el Valor
		return $suma;
	}

	function getNeto() {
		$total = $this->getTotalTransaccion();
		$neto = $total / 1.19;
		return round($neto);
	}

	function getIva() {
		return $this->getTotalTransaccion() - $this->getNeto();
	}

	// Obtener Ítems de la Transacción
	function getItems() {
		return $this->items;
	}

	// Agregar Ítem a la transacción
	function addItem(ItemTransaccion $item) {
		$this->items[] = $item;
	}

}
