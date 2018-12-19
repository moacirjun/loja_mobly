<?php

namespace App\Http\Controllers;

use App\Produto;
use App\Services\ProdutoRepository;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    private $produtos;

    public function __construct(ProdutoRepository $repository)
    {
        $this->produtos = $repository;
    }

    public function index()
    {
        $produtos = $this->produtos->getAll(16);

        return view('produto/catalogo', ['produtos' => $produtos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function show(Produto $produto)
    {
        $semelhantes = $this->produtos->recomendados($produto);

        return view('produto/show', [
            'produto' => $produto,
            'semelhantes' => $semelhantes
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function edit(Produto $produto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produto $produto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produto $produto)
    {
        //
    }
}
