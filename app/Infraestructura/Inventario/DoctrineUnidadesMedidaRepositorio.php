<?php
namespace Perfumeria\Infraestructura\Inventario;

use Doctrine\ORM\EntityManager;
use Monolog\Logger as Log;
use Monolog\Handler\StreamHandler;
use PDOException;
use Perfumeria\Aplicacion\Logger;
use Perfumeria\Dominio\Inventario\Repositorios\UnidadesMedidaRepositorio;
use Perfumeria\Dominio\Inventario\UnidadMedida;

/**
 * Class DoctrineUnidadesMedidaRepositorio
 * @package Perfumeria\Infraestructura\Inventario
 * @author Gerardo Adrián Gómez Ruiz
 * @version 1.0
 */
class DoctrineUnidadesMedidaRepositorio implements UnidadesMedidaRepositorio
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
            $query      = $this->entityManager->createQuery('SELECT u FROM Inventario:UnidadMedida u');
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
     * @return UnidadMedida
     */
    public function obtenerPorId($id)
    {
        // TODO: Implement obtenerPorId() method.
        try {
            $query   = $this->entityManager->createQuery('SELECT u FROM Inventario:UnidadMedida u WHERE u.id = :id')
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