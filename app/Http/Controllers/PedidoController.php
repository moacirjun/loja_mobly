<?php

namespace App\Http\Controllers;

use App\Services\PedidoRepository;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    private $pedidoRepository;

    public function __construct(PedidoRepository $pedidoRepository)
    {
        $this->pedidoRepository = $pedidoRepository;
    }


    public function show(Request $request, $pedido_id)
    {
        $pedido = $this->pedidoRepository->findByID($pedido_id);

        if ( is_null($pedido) ) {
            abort(404);
        }

        return view('pedido.index', ['pedido' => $pedido]);
    }
}
