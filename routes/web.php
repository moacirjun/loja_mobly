<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@index');

Route::resource('produtos', 'ProdutoController');

Route::resource('categorias', 'CategoriaController');

Route::get('pesquisar/{param?}', 'PesquisaController@index')->where('param', '[\wA-z\wÀ-ú]+');

Route::get('carrinho', 'CarrinhoController@index')->name('carrinho');
Route::get('carrinho/add-produto/{id}', 'CarrinhoController@adicionarProduto')->name('carrinho.add');
Route::get('carrinho/remover-produto/{id}', 'CarrinhoController@removerProduto')->name('carrinho.remove');

Route::get('checkout', 'CheckoutController@index')->name('checkout');
Route::post('checkout', 'CheckoutController@checkout')->name('checkout.make');

Route::get('minha-conta', 'UserController@index')->name('minha-conta');

Route::get('pedido/{id}', 'PedidoController@show')->name('pedido.show');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')->group(function () {
    Route::resource('produtos', 'Admin\ProdutosController');
    Route::resource('categorias', 'Admin\CategoriaController');
});
