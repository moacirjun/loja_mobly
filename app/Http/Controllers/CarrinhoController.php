<?php

namespace App\Http\Controllers;

use App\Carrinho;
use App\CarrinhoItem;
use App\Produto;
use App\Services\CarrinhoRepository;
use App\Services\PedidoRepository;
use App\Services\ProdutoRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class CarrinhoController extends Controller
{
    private $pedidos;
    private $cartRepository;
    private $produtoRepo;

    public function __construct()
    {
        //$this->middleware('auth');

        $this->pedidos = new PedidoRepository();
        $this->cartRepository = new CarrinhoRepository();
        $this->produtoRepo = new ProdutoRepository();
    }

    public function index()
    {
        $carrinho = $this->cartRepository->getByToken(Carrinho::getToken());
        return view('carrinho.index', ['carrinho' => $carrinho]);
    }

    public function adicionarProduto(Request $request, $produto_id)
    {
        $produto = $this->produtoRepo->findByID($produto_id);

        if ( !$produto ) {
            return abort(404);
        }

        if ( Carrinho::existe() )
        {
            $this->cartRepository->adicionarProduto(Carrinho::getToken(), $produto);
        }
        else
        {
            if (Auth::check())
            {
                $token = $this->cartRepository->gerarCarrinhoParaUsuario(Auth::id());
            }
            else
            {
                $token = $this->cartRepository->gerarCarrinhoParaVisitante();
            }

            $cookie = Carrinho::makeCookieByToken($token);
            $this->cartRepository->adicionarProduto($token, $produto);

            return redirect( route('carrinho') )->cookie($cookie);
        }

        return redirect( route('carrinho') );
    }

    public function removerProduto(Request $request, $produto_id)
    {
        $produto = $this->produtoRepo->findByID($produto_id);

        if ( !$produto ) {
            return abort(404);
        }

        $this->cartRepository->removerProduto(Carrinho::getToken(), $produto);

        return redirect( route('carrinho') );
    }
}
