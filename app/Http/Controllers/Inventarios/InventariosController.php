<?php
namespace Perfumeria\Http\Controllers\Inventarios;

use Perfumeria\Dominio\Diseniadores\Repositorios\DiseniadoresRepositorio;
use Perfumeria\Dominio\Perfumes\Repositorios\AcordesRepositorio;
use Perfumeria\Dominio\Perfumes\Repositorios\FamiliasOlfativasRepositorio;
use Perfumeria\Dominio\Perfumes\Repositorios\NotasRepositorio;
use Perfumeria\Dominio\Productos\ProductoTentaciones;
use Perfumeria\Dominio\Productos\Repositorios\ProductosRepositorio;
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
     * ProductosController constructor.
     * @param DiseniadoresRepositorio $diseniadoresRepositorio
     * @param FamiliasOlfativasRepositorio $familiasOlfativasRepositorio
     * @param AcordesRepositorio $acordesRepositorio
     * @param NotasRepositorio $notasRepositorio
     */
    public function __construct(DiseniadoresRepositorio $diseniadoresRepositorio, FamiliasOlfativasRepositorio $familiasOlfativasRepositorio, AcordesRepositorio $acordesRepositorio, NotasRepositorio $notasRepositorio)
    {
        $this->diseniadoresRepositorio      = $diseniadoresRepositorio;
        $this->familiasOlfativasRepositorio = $familiasOlfativasRepositorio;
        $this->acordesRepositorio           = $acordesRepositorio;
        $this->notasRepositorio             = $notasRepositorio;
    }

    /**
     * crear vista de listado de inventarios
     * @return mixed
     */
    public function index()
    {
        return view('inventario.inventario');
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

        return view('inventario.inventario_nuevo', compact('diseniadores', 'familiasOlfativas', 'notas', 'acordes'));
    }
}