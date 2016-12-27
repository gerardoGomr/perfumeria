<?php
namespace Tentaciones\Dominio\Usuarios\Repositorios;

use Tentaciones\Dominio\Repositorios\Repositorio;
use Tentaciones\Dominio\Usuarios\Usuario;

/**
 * Interface UsuariosRepositorio
 * @package Tentaciones\Dominio\Usuarios\Repositorios
 * @author Gerardo Adrián Gómez Ruiz
 * @version 1.0
 */
interface UsuariosRepositorio extends Repositorio
{
    /**
     * @param string $username
     * @return Usuario|null
     */
    public function obtenerPorUsername($username);
}