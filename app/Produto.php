<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Produto extends Model
{
    protected $table = "tb_produtos";

    public function categorias() {
        return $this->belongsToMany('App\Categoria', 'tb_produto_categoria');
    }
}
