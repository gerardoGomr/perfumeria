<?php
namespace Perfumeria\Dominio\Perfumes;

/**
 * Class FamiliaOlfativa
 * @package Perfumeria\Dominio\Perfumes
 * @author Gerardo Adrián Gómez Ruiz
 * @version 1.0
 */
class FamiliaOlfativa
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $familia;

    /**
     * FamiliaOlfativa constructor.
     * @param int $id
     * @param string $familia
     */
    public function __construct($id, $familia)
    {
        $this->id      = $id;
        $this->familia = $familia;
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
    public function getFamilia()
    {
        return $this->familia;
    }
}