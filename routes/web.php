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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
