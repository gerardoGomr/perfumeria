<?php
namespace Tentaciones\Aplicacion;

use Tentaciones\Dominio\Listas\IColeccion;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class ColeccionArray
 * @package Siacme\Aplicacion
 * @author Gerardo Adrián Gómez Ruiz
 * @version 1.0
 */
class ColeccionArray extends ArrayCollection implements IColeccion
{

}