<?php

namespace App\Http\Controllers;

use App\Carrinho;
use App\Services\CarrinhoRepository;
use App\Services\PedidoRepository;
use App\Services\ProdutoRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CarrinhoController extends Controller
{
    private $pedidos;
    private $cartRepository;
    private $produtoRepo;

    public function __construct(
        PedidoRepository $pedidoRepository,
        CarrinhoRepository $carrinhoRepository,
        ProdutoRepository $produtoRepository
    )
    {
        $this->pedidos = $pedidoRepository;
        $this->cartRepository = $carrinhoRepository;
        $this->produtoRepo = $produtoRepository;
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
