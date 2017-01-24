<?php
namespace Perfumeria\Http\Controllers\Inventarios;

use Illuminate\Http\Request;
use Perfumeria\Dominio\Diseniadores\Repositorios\DiseniadoresRepositorio;
use Perfumeria\Dominio\Inventario\ProductoInventario;
use Perfumeria\Dominio\Inventario\Repositorios\ProductosInventarioRepositorio;
use Perfumeria\Dominio\Inventario\Repositorios\UnidadesMedidaRepositorio;
use Perfumeria\Dominio\Perfumes\Repositorios\AcordesRepositorio;
use Perfumeria\Dominio\Perfumes\Repositorios\FamiliasOlfativasRepositorio;
use Perfumeria\Dominio\Perfumes\Repositorios\NotasRepositorio;
use Perfumeria\Dominio\Productos\Repositorios\ProductosRepositorio;
use Perfumeria\Dominio\Inventario\Repositorios\CategoriasProductosRepositorio;
use Perfumeria\Http\Controllers\Controller;

/**
 * Class InventariosController
 * @package Perfumeria\Http\Controllers\Inventarios
 * @author Gerardo Adrián Gómez Ruiz
 * @version 1.0
 */
class InventariosController extends Controller
{
    /**
     * @var DiseniadoresRepositorio
     */
    private $diseniadoresRepositorio;

    /**
     * @var FamiliasOlfativasRepositorio
     */
    private $familiasOlfativasRepositorio;

    /**
     * @var AcordesRepositorio
     */
    private $acordesRepositorio;

    /**
     * @var NotasRepositorio
     */
    private $notasRepositorio;

    /**
     * @var ProductosRepositorio
     */
    private $productosRepositorio;

    /**
     * @var CategoriasProductosRepositorio
     */
    private $categoriasProductosRepositorio;

    /**
     * @var UnidadesMedidaRepositorio
     */
    private $unidadesMedidaRepositorio;

    /**
     * @var ProductosInventarioRepositorio
     */
    private $productosInventarioRepositorio;

    /**
     * ProductosController constructor.
     * @param DiseniadoresRepositorio $diseniadoresRepositorio
     * @param FamiliasOlfativasRepositorio $familiasOlfativasRepositorio
     * @param AcordesRepositorio $acordesRepositorio
     * @param NotasRepositorio $notasRepositorio
     * @param ProductosRepositorio $productosRepositorio
     * @param CategoriasProductosRepositorio $categoriasProductosRepositorio
     * @param UnidadesMedidaRepositorio $unidadesMedidaRepositorio
     * @param ProductosInventarioRepositorio $productosInventarioRepositorio
     */
    public function __construct(DiseniadoresRepositorio $diseniadoresRepositorio,
                                FamiliasOlfativasRepositorio $familiasOlfativasRepositorio,
                                AcordesRepositorio $acordesRepositorio,
                                NotasRepositorio $notasRepositorio,
                                ProductosRepositorio $productosRepositorio,
                                CategoriasProductosRepositorio $categoriasProductosRepositorio,
                                UnidadesMedidaRepositorio $unidadesMedidaRepositorio,
                                ProductosInventarioRepositorio $productosInventarioRepositorio)
    {
        $this->diseniadoresRepositorio        = $diseniadoresRepositorio;
        $this->familiasOlfativasRepositorio   = $familiasOlfativasRepositorio;
        $this->acordesRepositorio             = $acordesRepositorio;
        $this->notasRepositorio               = $notasRepositorio;
        $this->productosRepositorio           = $productosRepositorio;
        $this->categoriasProductosRepositorio = $categoriasProductosRepositorio;
        $this->unidadesMedidaRepositorio      = $unidadesMedidaRepositorio;
        $this->productosInventarioRepositorio = $productosInventarioRepositorio;
    }

    /**
     * crear vista de listado de inventarios
     * @return mixed
     */
    public function index()
    {
        $productos = $this->productosInventarioRepositorio->obtenerTodos();
        return view('inventario.inventario', compact('productos'));
    }

    /**
     * crear vista para registro de nuevo elemento al inventario
     * @return mixed
     */
    public function crear()
    {
        $diseniadores      = $this->diseniadoresRepositorio->obtenerTodos();
        $familiasOlfativas = $this->familiasOlfativasRepositorio->obtenerTodos();
        $notas             = $this->notasRepositorio->obtenerTodos();
        $acordes           = $this->acordesRepositorio->obtenerTodos();
        $productos         = $this->productosRepositorio->obtenerTodos();
        $categorias        = $this->categoriasProductosRepositorio->obtenerTodos();
        $unidadesMedida    = $this->unidadesMedidaRepositorio->obtenerTodos();

        return view('inventario.inventario_nuevo', compact('diseniadores', 'familiasOlfativas', 'notas', 'acordes', 'productos', 'categorias', 'unidadesMedida'));
    }

    /**
     * buscar productos y asignarlos a la vista para el combo
     * @return \Illuminate\Http\JsonResponse
     */
    public function recargarProductos()
    {
        $respuesta = ['estatus' => 'OK'];
        $productos = $this->productosRepositorio->obtenerTodos();

        $respuesta['html'] =  view('inventario.productos_combo', compact('productos'))->render();

        return response()->json($respuesta);
    }

    /**
     * guardar nuevo producto a inventario
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function guardar(Request $request)
    {
        $respuesta      = ['estatus' => 'OK'];
        $productoId     = (int)$request->get('producto');
        $categoriaId    = (int)$request->get('categoria');
        $presentacion   = (double)$request->get('presentacion');
        $unidadMedidaId = (int)$request->get('unidadMedida');

        $producto     = $this->productosRepositorio->obtenerPorId($productoId);
        $categoria    = $this->categoriasProductosRepositorio->obtenerPorId($categoriaId);
        $unidadMedida = $this->unidadesMedidaRepositorio->obtenerPorId($unidadMedidaId);

        $productoInventario = new ProductoInventario($producto, $categoria, $presentacion, $unidadMedida);

        if (!$this->productosInventarioRepositorio->persistir($productoInventario)) {
            $respuesta['estatus'] = 'fail';
            $respuesta['mensaje'] = 'Ocurrió un error al guardar cambios en inventarios en la base de datos';
        }

        $productoInventario->generarCodigo();

        if (!$this->productosInventarioRepositorio->persistir($productoInventario)) {
            $respuesta['estatus'] = 'fail';
            $respuesta['mensaje'] = 'Ocurrió un error al guardar cambios en inventarios en la base de datos';
        }

        return response()->json($respuesta);
    }
}