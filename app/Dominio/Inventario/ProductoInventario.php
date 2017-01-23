<?php
namespace Perfumeria\Dominio\Inventario;

use Perfumeria\Dominio\Productos\Producto;

/**
 * Class ProductoInventario
 * @package Perfumeria\Dominio\Inventario
 * @author Gerardo Adrián Gómez Ruiz
 * @version 1.0
 */
class ProductoInventario
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var Producto
     */
    private $producto;

    /**
     * @var CategoriaProducto
     */
    private $categoria;

    /**
     * @var double
     */
    private $presentacion;

    /**
     * @var UnidadMedida
     */
    private $unidadMedida;

    /**
     * @var string
     */
    private $codigo;

    /**
     * ProductoInventario constructor.
     * @param Producto $producto
     * @param CategoriaProducto $categoria
     * @param double $presentacion
     * @param UnidadMedida $unidadMedida
     */
    public function __construct(Producto $producto, CategoriaProducto $categoria, $presentacion, UnidadMedida $unidadMedida)
    {
        $this->producto     = $producto;
        $this->categoria    = $categoria;
        $this->presentacion = $presentacion;
        $this->unidadMedida = $unidadMedida;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return Producto
     */
    public function getProducto()
    {
        return $this->producto;
    }

    /**
     * @return CategoriaProducto
     */
    public function getCategoria()
    {
        return $this->categoria;
    }

    /**
     * @return Presentacion
     */
    public function getPresentacion()
    {
        return $this->presentacion;
    }

    /**
     * @return string
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * @return UnidadMedida
     */
    public function getUnidad()
    {
        return $this->unidadMedida;
    }

    public function generarCodigo() {}
}