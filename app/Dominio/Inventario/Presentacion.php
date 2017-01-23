<?php
namespace Perfumeria\Dominio\Inventario;

/**
 * Class Presentacion
 * @package Perfumeria\Dominio\Inventario
 * @author Gerardo Adrián Gómez Ruiz
 * @version 1.0
 */
class Presentacion
{
    /**
     * @var double
     */
    private $presentacion;

    /**
     * @var UnidadMedida
     */
    private $unidadMedida;

    /**
     * Presentacion constructor.
     * @param float $presentacion
     * @param UnidadMedida $unidadMedida
     */
    public function __construct($presentacion, UnidadMedida $unidadMedida)
    {
        $this->presentacion = $presentacion;
        $this->unidadMedida = $unidadMedida;
    }

    /**
     * @return float
     */
    public function getPresentacion()
    {
        return $this->presentacion;
    }

    /**
     * @return UnidadMedida
     */
    public function getUnidadMedida()
    {
        return $this->unidadMedida;
    }

    /**
     * @return string
     */
    public function presentacion()
    {
        return (string)$this->presentacion . ' ' . $this->unidadMedida->getUnidad();
    }
}