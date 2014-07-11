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

}
