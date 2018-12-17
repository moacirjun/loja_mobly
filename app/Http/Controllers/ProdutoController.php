<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;

class ProdutoController extends Controller
{
    public function listar() {
        $produtos = Produto::paginate(16);

        return view('produto/catalogo', ['produtos' => $produtos]);
    }
}
