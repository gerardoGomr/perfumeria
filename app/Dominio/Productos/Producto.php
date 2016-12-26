<?php
namespace Tentaciones\Dominio\Productos;

use DateTime;

/**
 * Class Producto
 * @package Tentaciones\Dominio\Productos
 * @author  Gerardo Adrián Gómez Ruiz
 * @version 2.0
 */
class Producto
{
	/**
	 * @var int
	 */
	protected $id;

	/**
	 * @var string
	 */
	protected $nombre;

	/**
	 * @var string
	 */
	protected $descripcion;

	/**
	 * @var DateTime
	 */
	protected $fechaAlta;

	/**
	 * @var Marca
	 */
	protected $marca;

	/**
	 * @var Fotografia
	 */
	protected $imagen;

	/**
	 * Producto constructor.
	 * @param string $nombre
	 * @param DateTime $fechaAlta
	 * @param string|null $descripcion
	 * @param Fotografia|null $imagen
	 */
	public function __construct($nombre, DateTime $fechaAlta, $descripcion = null, Fotografia $imagen = null)
	{
		$this->nombre      = $nombre;
		$this->fechaAlta   = $fechaAlta;
		$this->descripcion = $descripcion;
		$this->imagen      = $imagen;
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
	 * @return string
	 */
	public function getDescripcion()
	{
		return $this->descripcion;
	}

	/**
	 * @return string
	 */
	public function getFechaAlta()
	{
		return $this->fechaAlta->format('d/m/Y');
	}

	/**
	 * @return Marca
	 */
	public function getMarca()
	{
		return $this->marca;
	}

	/**
	 * @return Imagen
	 */
	public function getImagen()
	{
		return $this->imagen;
	}
}