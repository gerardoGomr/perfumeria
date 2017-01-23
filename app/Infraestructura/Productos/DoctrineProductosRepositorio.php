<?php
namespace Perfumeria\Infraestructura\Productos;

use Doctrine\ORM\EntityManager;
use Monolog\Logger as Log;
use Monolog\Handler\StreamHandler;
use PDOException;
use Perfumeria\Aplicacion\Logger;
use Perfumeria\Dominio\Productos\Producto;
use Perfumeria\Dominio\Productos\Repositorios\ProductosRepositorio;

/**
 * Class DoctrineProductosRepositorio
 * @package Perfumeria\Infraestructura\Productos
 * @author Gerardo Adrián Gómez Ruiz
 * @version 1.0
 */
class DoctrineProductosRepositorio implements ProductosRepositorio
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
            $query   = $this->entityManager->createQuery('SELECT a FROM Perfumes:Acorde a');
            $acordes = $query->getResult();

            if (count($acordes) > 0) {
                return $acordes;
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
     * @return mixed
     */
    public function obtenerPorId($id)
    {
        // TODO: Implement obtenerPorId() method.
    }

    /**
     * persistir los cambios
     * @param Producto $producto
     * @return bool
     */
    public function persistir(Producto $producto)
    {
        try {
            if (is_null($producto->getId())) {
                $this->entityManager->persist($producto);
            }

            $this->entityManager->flush();

            return true;

        } catch (PDOException $e) {
            $pdoLogger = new Logger(new Log('pdo_exception'), new StreamHandler(storage_path() . '/logs/pdo/sqlsrv_' . date('Y-m-d') . '.log', Log::ERROR));
            $pdoLogger->log($e);
            return false;
        }
    }
}