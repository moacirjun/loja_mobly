<?php
/**
 * Created by PhpStorm.
 * User: moaci
 * Date: 12/19/2018
 * Time: 10:40 PM
 */

namespace App\Services;


use App\User;
use Artesaos\Warehouse\CrudRepository;
use Illuminate\Support\Facades\Hash;

class UserRepository extends CrudRepository
{
    protected $modelClass = "App\User";

    public function novoUsuario($data)
    {
        return $this->create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'estado' => $data['estado'],
            'cidade' => $data['cidade'],
            'logradouro' => $data['logradouro'],
            'numero' => $data['numero'],
            'user_type' => User::USER_TYPE_CUSTOMER
        ]);
    }
}