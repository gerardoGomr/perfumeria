<?php
namespace Perfumeria\Dominio\Repositorios;

/**
 * Interface Repositorio
 * @package Perfumeria\Dominio\Repositorios
 * @author Gerardo Adrián Gómez Ruiz
 * @version 1.0
 */
interface Repositorio
{
    /**
     * @return array
     */
    public function obtenerTodos();

    /**
     * @param int $id
     * @return mixed
     */
    public function obtenerPorId($id);
}