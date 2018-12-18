<?php

namespace App\Http\Controllers;

use App\Services\ProdutoRepository;
use Illuminate\Http\Request;

class PesquisaController extends Controller
{
    private $produtos;

    public function __construct()
    {
        $this->produtos = new ProdutoRepository();
    }

    public function index(Request $request, $param = "")
    {
        $produtos = $this->produtos->pesquisar($param);
        return view('pesquisa/index', ['produtos' => $produtos]);
    }
}
