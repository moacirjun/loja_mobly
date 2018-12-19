<?php

namespace App\Http\Controllers;

use App\Services\ProdutoRepository;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $produtos;

    public function __construct()
    {
        $this->produtos = new ProdutoRepository();
    }

    public function index()
    {
        $produtos = $this->produtos->getAll();
        return view('home', ['produtos' => $produtos]);
    }
}
