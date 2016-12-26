<?php
namespace Tentaciones\Dominio\Diseniadores;

/**
 * Class Diseniador
 * @package Tentaciones\Dominio\Diseniadores
 * @author Gerardo Adrián Gómez Ruiz
 * @version 2.0
 */
class Diseniador
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
     * @var string
     */
    private $siglas;

    /**
     * @var Imagen
     */
    private $imagen;

    /**
     * Marca constructor.
     * @param string $nombre
     * @param string $siglas
     * @param Imagen|null $imagen
     */
    public function __construct($nombre, $siglas, Imagen $imagen = null)
    {
        $this->nombre = $nombre;
        $this->siglas = $siglas;
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
     * @return string
     */
    public function getSiglas()
    {
        return $this->siglas;
    }

    /**
     * @return Imagen
     */
    public function getImagen()
    {
        return $this->imagen;
    }
}