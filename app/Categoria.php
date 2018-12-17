<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = "tb_categorias";

    public function produtos() {
        return $this->belongsToMany('App\Produto', 'tb_produto_categoria');
    }
}
