<?php
namespace Perfumeria\Infraestructura\Perfumes;

use Doctrine\ORM\EntityManager;
use Monolog\Logger as Log;
use Monolog\Handler\StreamHandler;
use PDOException;
use Perfumeria\Aplicacion\Logger;
use Perfumeria\Dominio\Perfumes\FamiliaOlfativa;
use Perfumeria\Dominio\Perfumes\Repositorios\FamiliasOlfativasRepositorio;

/**
 * Class DoctrineFamiliasOlfativasRepositorio
 * @package Perfumeria\Infraestructura\Perfumes
 * @author Gerardo Adrián Gómez Ruiz
 * @version 2.0
 */
class DoctrineFamiliasOlfativasRepositorio implements FamiliasOlfativasRepositorio
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
            $query             = $this->entityManager->createQuery('SELECT f FROM Perfumes:FamiliaOlfativa f');
            $familiasOlfativas = $query->getResult();

            if (count($familiasOlfativas) > 0) {
                return $familiasOlfativas;
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
     * @return FamiliaOlfativa|null
     */
    public function obtenerPorId($id)
    {
        // TODO: Implement obtenerPorId() method.
        try {
            $query = $this->entityManager->createQuery('SELECT f FROM Perfumes:FamiliaOlfativa f WHERE f.id = :id')
                ->setParameter('id', $id);

            $familiaOlfativa = $query->getResult();

            if (count($familiaOlfativa) > 0) {
                return $familiaOlfativa[0];
            }

            return null;

        } catch (PDOException $e) {
            $pdoLogger = new Logger(new Log('pdo_exception'), new StreamHandler(storage_path() . '/logs/pdo/sqlsrv_' . date('Y-m-d') . '.log', Log::ERROR));
            $pdoLogger->log($e);
            return null;
        }
    }
}