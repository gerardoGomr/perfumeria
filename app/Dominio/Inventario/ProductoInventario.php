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
     * @var int
     */
    private $cantidad;

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
        $this->cantidad     = 0;
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
    public function getUnidadMedida()
    {
        return $this->unidadMedida;
    }

    /**
     * @return int
     */
    public function getCantidad()
    {
        return $this->cantidad;
    }

    /**
     * generar el código de identificación del producto
     */
    public function generarCodigo()
    {
        $cadena = 'CP';
        $numero = '';

        $longitud     = strlen((string)$this->id);
        $longitudBase = 5 - $longitud;

        for ($i = 1; $i <= $longitudBase; $i++) {
            $numero .= '0';
        }

        $numero .= (string)$this->id;

        $this->codigo = $cadena . $numero;
    }

    /**
     * obtener la descripción completa del inventario
     * @return string
     */
    public function descripcion()
    {
        return $this->producto->getDiseniador()->getNombre() . ' ' . $this->producto->getNombre() . ' ' . $this->categoria->getCategoria() . ' ' . $this->presentacion . ' ' . $this->unidadMedida->getUnidad();
    }
}