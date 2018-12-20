<?php
/**
 * Created by PhpStorm.
 * User: moaci
 * Date: 12/18/2018
 * Time: 2:02 AM
 */

namespace App\Services;


use App\PedidoItem;
use Artesaos\Warehouse\CrudRepository;

class PedidoRepository extends CrudRepository
{
    protected $modelClass = 'App\Pedido';

    public function criarPedidoPago($user)
    {
        $model = $this->factory([
            'user_id' => $user->id,
            'entrega_estado' => $user->estado,
            'entrega_cidade' => $user->cidade,
            'entrega_logradouro' => $user->logradouro,
            'entrega_numero' => $user->numero,
            'status' => 'PA'
        ]);

        $this->save($model);

        return $model;
    }

    public function adicionarItems($pedido, $items)
    {
        $pedidosItens = [];

        foreach ($items as $carrinhoItem) {
            $pedidosItens[] = new PedidoItem([
                'produto_id' => $carrinhoItem->produto_id,
                'valor' => $carrinhoItem->valor,
                'status' => $pedido->status
            ]);
        }

        $pedido->itens()->saveMany($pedidosItens);
    }
}