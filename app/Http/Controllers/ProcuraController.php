<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProcuraController extends Controller
{
    public function __construct()
    {

    }

    public function index(Request $request, $param)
    {
        dd([
            $request,
            $param
        ]);
    }
}
