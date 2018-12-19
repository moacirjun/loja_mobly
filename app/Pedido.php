<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table = "tb_pedido";

    public function itens()
    {
        return $this->hasMany('App\PedidoItem')
                    ->select(\DB::raw('produto_id, sum(valor) as total_item, count(1) as qtde'))
                    ->groupBy('produto_id')
                    ->orderBy('produto_id', 'desc');
    }
}
