<?php
/**
 * Created by PhpStorm.
 * User: moaci
 * Date: 12/18/2018
 * Time: 9:08 PM
 */

namespace App\Services;


use App\CarrinhoItem;
use App\Produto;
use Artesaos\Warehouse\CrudRepository;
use Artesaos\Warehouse\Operations\CreateRecords;
use Artesaos\Warehouse\Contracts\Operations\CreateRecords as CreateRecordsContract;
use Artesaos\Warehouse\Repository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class CarrinhoRepository extends CrudRepository implements CreateRecordsContract
{
    use CreateRecords;

    protected $modelClass = "App\Carrinho";

    public function gerarCarrinhoParaUsuario($userId)
    {
        $newCartToken = str_random('32');

        $cart = $this->create([
            'token' => $newCartToken,
            'user_id' => $userId
        ]);

        return $cart->token;
    }

    public function gerarCarrinhoParaVisitante()
    {
        $newCartToken = str_random('32');

        $cart = $this->create([
            'token' => $newCartToken
        ]);

        return $cart->token;
    }

    public function adicionarProduto($token, Model $produto)
    {
        $cart = $this->getByToken($token);

        $cart->itens()->saveMany([
            new CarrinhoItem([
                'produto_id' => $produto->id,
                'valor' => $produto->preco
            ])
        ]);
    }

    public function removerProduto($token, Model $produto)
    {
        $cart = $this->getByToken($token);

        $cart->itens()
            ->where('produto_id', '=', $produto->id)
            ->delete();
    }

    public function getByToken($token)
    {
        return $this->newQuery()->where('token', '=', $token)->firstOrFail();
    }

}