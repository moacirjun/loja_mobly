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

    public function recomendados(Produto $produto, $take = 4)
    {
        $query = $this->queryProdutosDaMesmaCategoria($produto);

        return $this->doQuery($query, $take, false);
    }

    private function queryProdutosDaMesmaCategoria(Produto $produto)
    {
        return $this->newQuery()
            ->join('tb_produto_categoria', 'tb_produtos.id', '=', 'tb_produto_categoria.produto_id')
            ->whereIn('tb_produto_categoria.categoria_id', $produto->getCategoriasInArray())
            ->where('tb_produtos.id', '!=', $produto->id);
    }

    public function pesquisar($param, $take = 15)
    {
        $query = $this->newQuery()
            ->where('nome','like', "%$param%")
            ->orWhere('descricao','like', "%$param%");

        return $this->doQuery($query, $take);
    }
}