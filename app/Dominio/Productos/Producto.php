<?php
namespace Perfumeria\Dominio\Productos;

use DateTime;
use Perfumeria\Dominio\Diseniadores\Diseniador;

/**
 * Class Producto
 * @package Perfumeria\Dominio\Productos
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
	 * @var Fotografia
	 */
	protected $imagen;

	/**
	 * @var Diseniador
	 */
	protected $diseniador;

	/**
	 * Producto constructor.
	 * @param string $nombre
	 * @param DateTime $fechaAlta
	 * @param string|null $descripcion
	 * @param Diseniador $diseniador
	 * @param Fotografia|null $imagen
	 */
	public function __construct($nombre, DateTime $fechaAlta, $descripcion = null, Diseniador $diseniador, Fotografia $imagen = null)
	{
		$this->nombre      = $nombre;
		$this->fechaAlta   = $fechaAlta;
		$this->descripcion = $descripcion;
		$this->diseniador  = $diseniador;
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
	 * @return Imagen
	 */
	public function getImagen()
	{
		return $this->imagen;
	}

	/**
	 * @return Diseniador
	 */
	public function getDiseniador()
	{
		return $this->diseniador;
	}
}