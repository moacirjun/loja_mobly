<?php
/**
 * Created by PhpStorm.
 * User: moaci
 * Date: 12/18/2018
 * Time: 2:02 AM
 */

namespace App\Services;


use Artesaos\Warehouse\CrudRepository;

class PedidoRepository extends CrudRepository
{
    protected $modelClass = 'App\Pedido';
}