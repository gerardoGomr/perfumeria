<?php
namespace Perfumeria\Dominio\Inventario;

/**
 * Class CategoriaProducto
 * @package Perfumeria\Dominio\Inventario
 * @author Gerardo Adrián Gómez Ruiz
 * @version 1.0
 */
class CategoriaProducto
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $categoria;

    /**
     * CategoriaProducto constructor.
     * @param string $categoria
     */
    public function __construct($categoria)
    {
        $this->categoria = $categoria;
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
    public function getCategoria()
    {
        return $this->categoria;
    }
}