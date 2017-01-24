<?php
namespace Perfumeria\Dominio\Inventario\Repositorios;

use Perfumeria\Dominio\Inventario\ProductoInventario;
use Perfumeria\Dominio\Repositorios\Repositorio;

/**
 * Interface ProductosInventarioRepositorio
 * @package Perfumeria\Dominio\Inventario\Repositorios
 * @author Gerardo Adrián Gómez Ruiz
 * @version 1.0
 */
interface ProductosInventarioRepositorio extends Repositorio
{
    /**
     * persistir cambios en el almacenamiento
     * @param ProductoInventario $productoInventario
     * @return bool
     */
    public function persistir(ProductoInventario $productoInventario);
}