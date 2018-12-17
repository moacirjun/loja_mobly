<?php
/**
 * Created by PhpStorm.
 * User: moaci
 * Date: 12/17/2018
 * Time: 1:11 AM
 */

namespace App\Services;

use Artesaos\Warehouse\CrudRepository;
use App\Produto;

class ProdutoRepository extends CrudRepository
{
    protected $modelClass = "App\Produto";

    public function recomendados(Produto $produto) {

        $categorias = $produto->categorias()->get(['tb_categorias.id']);

        $categorias_id = [];
        foreach ($categorias as $categoria) {
            $categorias_id[] = $categoria->id;
        }

        $query = $this->newQuery();
        $query->join('tb_produto_categoria', 'tb_produtos.id', '=', 'tb_produto_categoria.produto_id')
            ->whereIn('tb_produto_categoria.categoria_id', $categorias_id)
            ->where('tb_produtos.id', '!=', $produto->id);

        return $this->doQuery($query, 3, false);
    }
}