<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarrinhoItem extends Model
{
    protected $table = "tb_carrinho_item";

    protected $fillable = ['produto_id', 'valor'];

    public function carrinho()
    {
        return $this->belongsTo('App\Carrinho', 'carrinho_id', 'id');
    }

    public function produto()
    {
        return $this->belongsTo('App\Produto');
    }

    public function getProdutoNome()
    {
        return $this->produto->nome;
    }
}
