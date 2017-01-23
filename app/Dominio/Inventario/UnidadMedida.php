<?php
namespace Perfumeria\Dominio\Inventario;

/**
 * Class UnidadMedida
 * @package Perfumeria\Dominio\Inventario
 * @author Gerardo Adrián Gómez Ruiz
 * @version 1.0
 */
class UnidadMedida
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $unidad;

    /**
     * CategoriaProducto constructor.
     * @param string $unidad
     */
    public function __construct($unidad)
    {
        $this->unidad = $unidad;
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
    public function getUnidad()
    {
        return $this->unidad;
    }
}