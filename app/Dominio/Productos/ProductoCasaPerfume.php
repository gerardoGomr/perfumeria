<?php
namespace Perfumeria\Dominio\Productos;

use DateTime;
use Perfumeria\Dominio\Diseniadores\Diseniador;
use Perfumeria\Dominio\Listas\IColeccion;
use Perfumeria\Dominio\Perfumes\Acorde;
use Perfumeria\Dominio\Perfumes\FamiliaOlfativa;
use Perfumeria\Dominio\Perfumes\Nota;
use Perfumeria\Exceptions\Productos\AcordeYaHaSidoAgregadoAProductoException;
use Perfumeria\Exceptions\Productos\NotaYaHaSidoAgregadoAProductoException;

/**
 * Class ProductoCasaPerfume
 * @package Perfumeria\Dominio\Productos
 * @author  Gerardo Adrián Gómez Ruiz
 * @version 2.0
 */
class ProductoCasaPerfume extends Producto
{
	/**
	 * @var int
	 */
	protected $anioLanzamiento;

	/**
	 * @var int
	 */
	protected $genero;

	/**
	 * @var FamiliaOlfativa
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
	 * ProductoTentaciones constructor.
	 * @param string $nombre
	 * @param DateTime $fechaAlta
	 * @param Diseniador $diseniador
	 * @param int $anioLanzamiento
	 * @param FamiliaOlfativa $familiaOlfativa
	 * @param int $genero
	 * @param IColeccion $acordes
	 * @param IColeccion $notas
	 * @param string|null $descripcion
	 * @param Fotografia|null $imagen
	 */
	public function __construct($nombre, DateTime $fechaAlta, Diseniador $diseniador, $anioLanzamiento, FamiliaOlfativa $familiaOlfativa, $genero, IColeccion $acordes, IColeccion $notas, $descripcion = null, Fotografia $imagen = null)
	{
		$this->anioLanzamiento = $anioLanzamiento;
		$this->genero          = $genero;
		$this->acordes  	   = $acordes;
		$this->notas		   = $notas;
		$this->familiaOlfativa = $familiaOlfativa;

		parent::__construct($nombre, $fechaAlta, $descripcion, $diseniador, $imagen);
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

	/**
 * agregar un nuevo acorde
 * @param Acorde $acorde
 * @throws AcordeYaHaSidoAgregadoAProductoException
 */
	public function agregarAcorde(Acorde $acorde)
	{
		if ($this->acordes->count() > 0) {
			foreach ($this->acordes as $acordeExistente) {
				if ($acordeExistente->getId() === $acorde->getId()) {
					throw new AcordeYaHaSidoAgregadoAProductoException('El acorde ' . $acorde->getAcorde() . ' ya ha sido agregado al producto');
				}
			}

			$this->acordes->add($acorde);
		} else {
			$this->acordes->add($acorde);
		}
	}

	/**
	 * agregar una nueva nota
	 * @param Nota $nota
	 * @throws NotaYaHaSidoAgregadoAProductoException
	 */
	public function agregarNota(Nota $nota)
	{
		if ($this->notas->count() > 0) {
			foreach ($this->notas as $notaExistente) {
				if ($notaExistente->getId() === $nota->getId()) {
					throw new NotaYaHaSidoAgregadoAProductoException('La nota ' . $nota->getNombre() . ' ya ha sido agregado al producto');
				}
			}

			$this->notas->add($nota);
		} else {
			$this->notas->add($nota);
		}
	}
}