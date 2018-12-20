<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cookie;
use Symfony\Component\HttpFoundation\Cookie as CookieSymfony;

class Carrinho extends Model
{
    protected $table = "tb_carrinho";

    protected $fillable = ['token', 'user_id'];

    public function itens()
    {
        return $this->hasMany('App\CarrinhoItem')
            ->select(\DB::raw('produto_id, sum(valor) as valor, count(1) as qtde'))
            ->groupBy('produto_id')
            ->orderBy('produto_id', 'desc');
    }

    public function itens_sem_somar()
    {
        return $this->hasMany('App\CarrinhoItem');
    }

    public function formatToJson()
    {
        $CarrinhoItens = $this->itens()->get();

        $listaProdutos = [];
        $total = 0;
        foreach ($CarrinhoItens as $item)
        {
            $total += $item->valor;

            $listaProdutos[] = [
                'qtde' => $item->qtde,
                'valor' => $this->format_real($item->valor),
                'nome' => $item->produto->nome,
                'produto_id' => $item->produto_id
            ];
        }

         return \GuzzleHttp\json_encode([
             "total" => $this->format_real($total),
             "itens" => $listaProdutos
         ], JSON_UNESCAPED_SLASHES);
    }

    private function format_real($number)
    {
        return "R$ " . number_format($number, 2, ',', '.');
    }

    public static function existe() : bool
    {
        return Cookie::has('CART');
    }

    public static function getToken() : ?string
    {
        return Cookie::get('CART');
    }

    public static function makeCookieByToken($token) : CookieSymfony
    {
        return Cookie::make('CART', $token, 21600, '/'); //15 dias
    }

    public static function matarCookie()
    {
        return setcookie('CART', '', 0, '/');
    }
}
