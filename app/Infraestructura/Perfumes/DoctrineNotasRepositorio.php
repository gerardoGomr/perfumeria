<?php
namespace Perfumeria\Infraestructura\Perfumes;

use Doctrine\ORM\EntityManager;
use Monolog\Logger as Log;
use Monolog\Handler\StreamHandler;
use PDOException;
use Perfumeria\Aplicacion\Logger;
use Perfumeria\Dominio\Perfumes\Nota;
use Perfumeria\Dominio\Perfumes\Repositorios\NotasRepositorio;

/**
 * Class DoctrineNotasRepositorio
 * @package Perfumeria\Infraestructura\Perfumes
 * @author Gerardo Adrián Gómez Ruiz
 * @version 2.0
 */
class DoctrineNotasRepositorio implements NotasRepositorio
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
            $query = $this->entityManager->createQuery('SELECT n FROM Perfumes:Nota n');
            $notas = $query->getResult();

            if (count($notas) > 0) {
                return $notas;
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
     * @return Nota
     */
    public function obtenerPorId($id)
    {
        // TODO: Implement obtenerPorId() method.
        try {
            $query = $this->entityManager->createQuery('SELECT n FROM Perfumes:Nota n WHERE n.id = :id')
                ->setParameter('id', $id);

            $notas = $query->getResult();

            if (count($notas) > 0) {
                return $notas[0];
            }

            return null;

        } catch (PDOException $e) {
            $pdoLogger = new Logger(new Log('pdo_exception'), new StreamHandler(storage_path() . '/logs/pdo/sqlsrv_' . date('Y-m-d') . '.log', Log::ERROR));
            $pdoLogger->log($e);
            return null;
        }
    }
}