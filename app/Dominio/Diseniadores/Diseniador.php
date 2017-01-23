<?php
namespace Perfumeria\Dominio\Diseniadores;

use Perfumeria\Dominio\Productos\Fotografia;

/**
 * Class Diseniador
 * @package Perfumeria\Dominio\Diseniadores
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
     * @var Fotografia
     */
    private $imagen;

    /**
     * Marca constructor.
     * @param string $nombre
     * @param Fotografia|null $imagen
     */
    public function __construct($nombre, Fotografia $imagen = null)
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