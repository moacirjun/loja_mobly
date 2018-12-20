<?php

namespace App\Http\Controllers;

use App\Carrinho;
use App\Services\CarrinhoRepository;
use App\Services\PedidoRepository;
use App\Services\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class CheckoutController extends Controller
{
    private $userRepository;
    private $pedidoRepository;
    private $carrinhoRepository;

    public function __construct(
        UserRepository $userRepository,
        PedidoRepository $pedidoRepository,
        CarrinhoRepository $carrinhoRepository
    )
    {
        $this->userRepository = $userRepository;
        $this->pedidoRepository = $pedidoRepository;
        $this->carrinhoRepository = $carrinhoRepository;
    }

    public function index(Request $request)
    {
        if (Auth::check())
        {
            $user = Auth::user();
            if ( $user->hasDefaultAddress() )
            {
                return view('checkout.user.index');
            }
            else
            {
                return view('checkout.user.add-address');
            }
        }
        else
        {
            return view('checkout.visitante');
        }
    }

    public function checkout(Request $request)
    {
        if (Auth::check()) {
            return $this->process_checkout($request);
        }
        else {
            return $this->process_checkout_visitante($request);
        }
    }

    public function process_checkout_visitante(Request $request)
    {
        $validador = $this->validador_visitante($request);
        $validador->validate();

        $newUser = $this->userRepository->novoUsuario($request->all());

        $pedido = $this->pedidoRepository->criarPedidoPago($newUser);

        $itemsCarrinho = $this->carrinhoRepository->getItems(Carrinho::getToken());

        $this->pedidoRepository->adicionarItems( $pedido, $itemsCarrinho );

        $this->carrinhoRepository->limparCarrinho(Carrinho::getToken());

        Auth::guard()->login($newUser);

        return redirect('minha-conta');
    }

    public function process_checkout(Request $request)
    {
        $validador = $this->validador($request);
        $validador->validate();

        $pedido = $this->pedidoRepository->criarPedidoPago(Auth::user());

        $itemsCarrinho = $this->carrinhoRepository->getItems(Carrinho::getToken());

        $this->pedidoRepository->adicionarItems( $pedido, $itemsCarrinho );

        $this->carrinhoRepository->limparCarrinho(Carrinho::getToken());

        return redirect('minha-conta');
    }

    private function validador_visitante(Request $request)
    {
        return Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'estado' => ['required', 'string', 'max:255'],
            'cidade' => ['required', 'string', 'max:255'],
            'logradouro' => ['required', 'string', 'max:255'],
            'numero' => ['required', 'string', 'max:10'],
            'card-number' => ['required', 'string', 'size:16'],
            'vencimento' => ['required', 'date', 'max:10'],
            'seguranca' => ['required', 'string', 'size:3'],
        ]);
    }

    private function validador(Request $request)
    {
        return Validator::make($request->all(), [
            'card-number' => ['required', 'string', 'size:16'],
            'vencimento' => ['required', 'date', 'max:10'],
            'seguranca' => ['required', 'string', 'size:3'],
        ]);
    }
}
