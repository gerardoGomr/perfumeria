<?php
namespace Perfumeria\Dominio\Perfumes;

use Perfumeria\Dominio\Productos\Fotografia;

/**
 * Class Nota
 * @package Perfumeria\Dominio\Perfumes
 * @author  Gerardo Adrián Gómez Ruiz
 * @version 2.0
 */
class Nota
{
	/**
	 * @var int
	 */
	private $id;

	/**
	 * @var string
	 */
	private $nombre;

	/**
	 * @var Fotografia
	 */
	private $imagen;

	/**
	 * Nota Constructor
	 * @param string $nombre
	 * @param Fotografia|null $imagen
	 */
	public function __construct($nombre, $imagen = null)
	{
		$this->nombre = $nombre;
		$this->imagen = $imagen;
	}

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @return Fotografia
     */
    public function getImagen()
    {
        return $this->imagen;
    }
}