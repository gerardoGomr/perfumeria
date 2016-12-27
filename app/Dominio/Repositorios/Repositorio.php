<?php
namespace Tentaciones\Dominio\Repositorios;

/**
 * Interface Repositorio
 * @package Tentaciones\Dominio\Repositorios
 * @author Gerardo Adrián Gómez Ruiz
 * @version 1.0
 */
interface Repositorio
{
    /**
     * @param int|null $oficinaId
     * @return array
     */
    public function obtenerTodos($oficinaId = null);

    /**
     * @param int $id
     * @param int|null $oficinaId
     * @return mixed
     */
    public function obtenerPorId($id, $oficinaId = null);
}