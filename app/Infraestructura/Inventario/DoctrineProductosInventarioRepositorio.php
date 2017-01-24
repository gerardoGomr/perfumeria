<?php
namespace Perfumeria\Infraestructura\Inventario;

use Doctrine\ORM\EntityManager;
use Monolog\Logger as Log;
use Monolog\Handler\StreamHandler;
use PDOException;
use Perfumeria\Aplicacion\Logger;
use Perfumeria\Dominio\Inventario\ProductoInventario;
use Perfumeria\Dominio\Inventario\Repositorios\ProductosInventarioRepositorio;

/**
 * Class DoctrineProductosInventarioRepositorio
 * @package Perfumeria\Infraestructura\Inventario
 * @author Gerardo Adrián Gómez Ruiz
 * @version 1.0
 */
class DoctrineProductosInventarioRepositorio implements ProductosInventarioRepositorio
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
            $query     = $this->entityManager->createQuery('SELECT p, po, um FROM Inventario:ProductoInventario p JOIN p.producto po JOIN p.unidadMedida um ORDER BY p.id DESC');
            $productos = $query->getResult();

            if (count($productos) > 0) {
                return $productos;
            }

            return null;

        } catch (PDOException $e) {
            $pdoLogger = new Logger(new Log('pdo_exception'), new StreamHandler(storage_path() . '/logs/pdo/sqlsrv_' . date('Y-m-d') . '.log', Log::ERROR));
            $pdoLogger->log($e);
            return null;
        }
    }


    public function obtenerPorId($id)
    {
        // TODO: Implement obtenerPorId() method.

    }

    /**
     * persistir cambios en el almacenamiento
     * @param ProductoInventario $productoInventario
     * @return bool
     */
    public function persistir(ProductoInventario $productoInventario)
    {
        // TODO: Implement persistir() method.
        try {
            if (is_null($productoInventario->getId())) {
                $this->entityManager->persist($productoInventario);
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