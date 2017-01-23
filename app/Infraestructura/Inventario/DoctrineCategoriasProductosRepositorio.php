<?php
namespace Perfumeria\Infraestructura\Inventario;

use Doctrine\ORM\EntityManager;
use Monolog\Logger as Log;
use Monolog\Handler\StreamHandler;
use PDOException;
use Perfumeria\Aplicacion\Logger;
use Perfumeria\Dominio\Inventario\Repositorios\CategoriasProductosRepositorio;
use Perfumeria\Dominio\Perfumes\Acorde;

/**
 * Class DoctrineCategoriasProductosRepositorio
 * @package Perfumeria\Infraestructura\Perfumes
 * @author Gerardo Adrián Gómez Ruiz
 * @version 1.0
 */
class DoctrineCategoriasProductosRepositorio implements CategoriasProductosRepositorio
{
    /**
     * @var EntityManager
     */
    protected $entityManager;

    /**
     * DoctrineUsuariosRepositorio constructor.
     * @param EntityManager $em
     */
    public function __construct(EntityManager $em)
    {
        $this->entityManager = $em;
    }

    /**
     * @return array
     */
    public function obtenerTodos()
    {
        // TODO: Implement obtenerTodos() method.
        try {
            $query      = $this->entityManager->createQuery('SELECT c FROM Inventario:CategoriaProducto c');
            $categorias = $query->getResult();

            if (count($categorias) > 0) {
                return $categorias;
            }

            return null;

        } catch (PDOException $e) {
            $pdoLogger = new Logger(new Log('pdo_exception'), new StreamHandler(storage_path() . '/logs/pdo/sqlsrv_' . date('Y-m-d') . '.log', Log::ERROR));
            $pdoLogger->log($e);
            return null;
        }
    }

    /**
     * @param int $id
     * @return Acorde
     */
    public function obtenerPorId($id)
    {
        // TODO: Implement obtenerPorId() method.
        try {
            $query   = $this->entityManager->createQuery('SELECT a FROM Perfumes:Acorde a WHERE a.id = :id')
                ->setParameter('id', $id);

            $acordes = $query->getResult();

            if (count($acordes) > 0) {
                return $acordes[0];
            }

            return null;

        } catch (PDOException $e) {
            $pdoLogger = new Logger(new Log('pdo_exception'), new StreamHandler(storage_path() . '/logs/pdo/sqlsrv_' . date('Y-m-d') . '.log', Log::ERROR));
            $pdoLogger->log($e);
            return null;
        }
    }
}