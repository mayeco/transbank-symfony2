<?php

namespace rotvulpix\Symfony\TransbankBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="WebPayEstado")
 */
class WebPayEstado{
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue
	 */
	protected $id = null;
	
	/**
	 * @ORM\Column(type="string", length=255, nullable=false, unique=true)
	 */
	protected $estado;
	
}