<?php
namespace Perfumeria\Http\Controllers\Productos;

use DateTime;
use Exception;
use Perfumeria\Aplicacion\ColeccionArray;
use Perfumeria\Dominio\Diseniadores\Repositorios\DiseniadoresRepositorio;
use Perfumeria\Dominio\Perfumes\Repositorios\AcordesRepositorio;
use Perfumeria\Dominio\Perfumes\Repositorios\FamiliasOlfativasRepositorio;
use Perfumeria\Dominio\Perfumes\Repositorios\NotasRepositorio;
use Perfumeria\Dominio\Productos\ProductoCasaPerfume;
use Perfumeria\Dominio\Productos\Repositorios\ProductosRepositorio;
use Perfumeria\Http\Controllers\Controller;
use Perfumeria\Http\Requests\CrearProductoRequest;

/**
 * Class ProductosController
 * @package Perfumeria\Http\Controllers\Productos
 * @author Gerardo Adrián Gómez Ruiz
 * @version 2.0
 */
class ProductosController extends Controller
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
     * ProductosController constructor.
     * @param DiseniadoresRepositorio $diseniadoresRepositorio
     * @param FamiliasOlfativasRepositorio $familiasOlfativasRepositorio
     * @param AcordesRepositorio $acordesRepositorio
     * @param NotasRepositorio $notasRepositorio
     */
    public function __construct(DiseniadoresRepositorio $diseniadoresRepositorio, FamiliasOlfativasRepositorio $familiasOlfativasRepositorio, AcordesRepositorio $acordesRepositorio, NotasRepositorio $notasRepositorio, ProductosRepositorio $productosRepositorio)
    {
        $this->diseniadoresRepositorio      = $diseniadoresRepositorio;
        $this->familiasOlfativasRepositorio = $familiasOlfativasRepositorio;
        $this->acordesRepositorio           = $acordesRepositorio;
        $this->notasRepositorio             = $notasRepositorio;
        $this->productosRepositorio         = $productosRepositorio;
    }


    /**
     * mostrar vista con el listado de productos
     * @return mixed
     */
    public function index()
    {
        return view('productos.productos');
    }

    /**
     * mostrar vista de captura de nuevo producto
     * @return mixed
     */
    public function crear()
    {
        $diseniadores      = $this->diseniadoresRepositorio->obtenerTodos();
        $familiasOlfativas = $this->familiasOlfativasRepositorio->obtenerTodos();
        $notas             = $this->notasRepositorio->obtenerTodos();
        $acordes           = $this->acordesRepositorio->obtenerTodos();

        return view('productos.productos_nuevo', compact('diseniadores', 'familiasOlfativas', 'notas', 'acordes'));
    }

    /**
     * crear nuevo producto
     * @param CrearProductoRequest $request
     * @return mixed
     */
    public function guardar(CrearProductoRequest $request)
    {
        $respuesta         = ['estatus' => 'OK'];
        $nombre            = $request->get('nombre');
        $diseniadorId      = (int)$request->get('diseniador');
        $anioLanzamiento   = (int)$request->get('anioLanzamiento');
        $enfocadoA         = (int)$request->get('enfocadoA');
        $familiaOlfativaId = (int)$request->get('familiaOlfativa');

        // objetos
        $diseniador        = $this->diseniadoresRepositorio->obtenerPorId($diseniadorId);
        $familiaOlfativa   = $this->familiasOlfativasRepositorio->obtenerPorId($familiaOlfativaId);

        $producto = new ProductoCasaPerfume($nombre, new DateTime(), $diseniador, $anioLanzamiento, $familiaOlfativa, $enfocadoA, new ColeccionArray(), new ColeccionArray());
        
        // verificar acordes
        if ($request->has('acordes')) {
            foreach ($request->get('acordes') as $indice => $acordeId) {
                $acordeId = (int)$acordeId;
                $acorde   = $this->acordesRepositorio->obtenerPorId($acordeId);

                try {
                    $producto->agregarAcorde($acorde);

                } catch (Exception $e) {
                    $respuesta['estatus'] = 'fail';
                    $respuesta['mensaje'] = $e->getMessage();

                    return response()->json($respuesta);
                }
            }
        }

        // verificar notas
        if ($request->has('notas')) {
            foreach ($request->get('notas') as $indice => $notaId) {
                $notaId = (int)$notaId;
                $nota   = $this->notasRepositorio->obtenerPorId($notaId);

                try {
                    $producto->agregarNota($nota);

                } catch (Exception $e) {
                    $respuesta['estatus'] = 'fail';
                    $respuesta['mensaje'] = $e->getMessage();

                    return response()->json($respuesta);
                }
            }
        }

        // persistir cambios
        if (!$this->productosRepositorio->persistir($producto)) {
            $respuesta['estatus'] = 'fail';
            $respuesta['mensaje'] = 'No se pudo guardar el producto en la base de datos.';
        }
        
        return response()->json($respuesta);
    }
}
