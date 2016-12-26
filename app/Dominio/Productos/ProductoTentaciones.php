<?php
namespace Tentaciones\Dominio\Productos;

use Tentaciones\Dominio\Diseniadores\Diseniador;

/**
 * Class ProductoTentaciones
 * @package Tentaciones\Dominio\Productos
 * @author  Gerardo Adrián Gómez Ruiz
 * @version 2.0
 */
class ProductoTentaciones extends Producto
{
	/**
	 * @var Diseniador
	 */
	protected $diseniador;

	/**
	 * @var int
	 */
	protected $anioLanzamiento;

	/**
	 * @var int
	 */
	protected $genero;

	/**
	 * ProductoTentaciones constructor.
	 * @param string $nombre
	 * @param DateTime $fechaAlta
	 * @param Diseniador $diseniador
	 * @param int $anioLanzamiento
	 * @param int $genero
	 * @param string|null $descripcion
	 * @param Fotografia|null $imagen
	 */
	public function __construct($nombre, DateTime $fechaAlta, Diseniador $diseniador, $anioLanzamiento, $genero, $descripcion = null, Fotografia $imagen = null)
	{
		$this->diseniador      = $diseniador;
		$this->anioLanzamiento = $anioLanzamiento;
		$this->genero          = $genero;

		parent::__construct($nombre, $fechaAlta, $descripcion, $imagen);
	}

	/**
	 * @return Diseniador
	 */
	public function getDiseniador()
	{
		return $this->diseniador;
	}

	/**
	 * @return int
	 */
	public function getAnioLanzamiento()
	{
		return $this->anioLanzamiento;
	}

	/**
	 * @return int
	 */
	public function getGenero()
	{
		return $this->genero;
	}
}