<?php
namespace Perfumeria\Infraestructura\Diseniadores;

use Doctrine\ORM\EntityManager;
use Monolog\Logger as Log;
use Monolog\Handler\StreamHandler;
use PDOException;
use Perfumeria\Aplicacion\Logger;
use Perfumeria\Dominio\Diseniadores\Diseniador;
use Perfumeria\Dominio\Diseniadores\Repositorios\DiseniadoresRepositorio;

/**
 * Class DoctrineDiseniadoresRepositorio
 * @package Perfumeria\Infraestructura\Diseniadores
 * @author Gerardo Adrián Gómez Ruiz
 * @version 2.0
 */
class DoctrineDiseniadoresRepositorio implements DiseniadoresRepositorio
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
            $query        = $this->entityManager->createQuery('SELECT d FROM Diseniadores:Diseniador d');
            $diseniadores = $query->getResult();

            if (count($diseniadores) > 0) {
                return $diseniadores;
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
     * @return Diseniador|null
     */
    public function obtenerPorId($id)
    {
        // TODO: Implement obtenerPorId() method.
        try {
            $query = $this->entityManager->createQuery('SELECT d FROM Diseniadores:Diseniador d WHERE d.id = :id')
                ->setParameter('id', $id);

            $diseniador = $query->getResult();

            if (count($diseniador) > 0) {
                return $diseniador[0];
            }

            return null;

        } catch (PDOException $e) {
            $pdoLogger = new Logger(new Log('pdo_exception'), new StreamHandler(storage_path() . '/logs/pdo/sqlsrv_' . date('Y-m-d') . '.log', Log::ERROR));
            $pdoLogger->log($e);
            return null;
        }
    }
}