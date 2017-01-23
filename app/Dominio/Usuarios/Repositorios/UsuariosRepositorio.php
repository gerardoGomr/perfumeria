<?php
namespace Perfumeria\Dominio\Usuarios\Repositorios;

use Perfumeria\Dominio\Repositorios\Repositorio;
use Perfumeria\Dominio\Usuarios\Usuario;

/**
 * Interface UsuariosRepositorio
 * @package Perfumeria\Dominio\Usuarios\Repositorios
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