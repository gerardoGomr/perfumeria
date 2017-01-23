<?php
namespace Perfumeria\Dominio\Perfumes;

/**
 * Class Acorde
 * @package Perfumeria\Dominio\Perfumes
 * @author  Gerardo Adrián Gómez Ruiz
 * @version 2.0
 */
class Acorde
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $acorde;

    /**
     * Acorde constructor.
     * @param string $acorde
     */
    public function __construct($acorde)
    {
        $this->acorde = $acorde;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getAcorde()
    {
        return $this->acorde;
    }
}