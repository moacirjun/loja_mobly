<?php
/**
 * Created by PhpStorm.
 * User: moaci
 * Date: 12/17/2018
 * Time: 1:23 AM
 */

namespace App\Services;


use Artesaos\Warehouse\CrudRepository;

class CategoriaRepository extends CrudRepository
{
    protected $modelClass = "App\Categoria";
}