<?php
namespace Tentaciones\Http\Controllers\Productos;

use Illuminate\Http\Request;
use Tentaciones\Http\Controllers\Controller;

/**
 * Class ProductosController
 * @package Tentaciones\Http\Controllers\Productos
 * @author Gerardo Adrián Gómez Ruiz
 * @version 2.0
 */
class ProductosController extends Controller
{
    /**
     * mostrar vista con el listado de productos
     * @return mixed
     */
    public function mostrarProductos()
    {
        return view('productos.productos');
    }

    /**
     * mostrar vista de captura de nuevo producto
     * @return mixed
     */
    public function mostrarCapturaNuevoProducto()
    {
        return view('productos.productos_nuevo');
    }
}
