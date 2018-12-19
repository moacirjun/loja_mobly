<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index(Request $request)
    {
        if (Auth::check())
        {
            $user = Auth::user();
            if ( $user->hasDefaultAddress() )
            {
                return view('checkout.user');
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
}
