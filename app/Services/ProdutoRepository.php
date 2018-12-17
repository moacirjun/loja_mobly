<?php
/**
 * Created by PhpStorm.
 * User: moaci
 * Date: 12/17/2018
 * Time: 1:11 AM
 */

namespace App\Services;

use Artesaos\Warehouse\CrudRepository;

class ProdutoRepository extends CrudRepository
{
    protected $modelClass = "App\Produto";
}