<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PedidoItem extends Model
{
    protected $table = "tb_pedido_item";

    protected $fillable = ['produto_id', 'status', 'valor'];

    public function produto()
    {
        return $this->belongsTo('App\Produto', 'produto_id', 'id');
    }

    public function getProdutoNome()
    {
        return $this->produto->nome;
    }

    public function totalItemFormatted()
    {
        return "R$ " . number_format($this->total_item, 2, ',', '.');
    }
}
