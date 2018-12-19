<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PedidoItem extends Model
{
    protected $table = "tb_pedido_item";

    public function produto()
    {
        return $this->belongsTo('App\Produto', 'produto_id', 'id');
    }
}
