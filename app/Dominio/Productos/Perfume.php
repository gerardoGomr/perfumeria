<?php
namespace Tentaciones\Dominio\Productos;

use Tentaciones\Dominio\Listas\IColeccion;

/**
 * Class Perfume
 * @package Tentaciones\Dominio\Productos
 * @author  Gerardo Adrián Gómez Ruiz
 * @version 2.0
 */
class Perfume extends ProductoTentaciones
{
	/**
	 * @var int
	 */
	private $familiaOlfativa;

	/**
	 * @var IColeccion
	 */
	private $acordes;

	/**
	 * @var IColeccion
	 */
	private $notas;

	/**
	 * Perfume constructor.
	 * @param int $familiaOlfativa
	 * @param IColeccion $acordes
	 * @param IColeccion $notas
	 * @param int $nombre
	 * @param DateTime $fechaAlta
	 * @param Diseniador $diseniador
	 * @param int $anioLanzamiento
	 * @param int $genero
	 * @param string|null $descripcion
	 * @param Fotografia $imagen
	 */
	public function __construct($familiaOlfativa, IColeccion $acordes, IColeccion $notas, $nombre, DateTime $fechaAlta, Diseniador $diseniador, $anioLanzamiento, $genero, $descripcion = null, Fotografia $imagen = null)
	{
		$this->familiaOlfativa = $familiaOlfativa;
		$this->acordes         = $acordes;
		$this->notas           = $notas;

		parent::__construct($diseniador, $anioLanzamiento, $genero);
	}

	/**
	 * @return int
	 */
	public function getFamiliaOlfativa()
	{
		return $this->familiaOlfativa;
	}

	/**
	 * @return IColeccion
	 */
	public function getAcordes()
	{
		return $this->acordes;
	}

	/**
	 * @return IColeccion
	 */
	public function getNotas()
	{
		return $this->notas;
	}
}