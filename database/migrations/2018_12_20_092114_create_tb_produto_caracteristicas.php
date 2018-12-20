<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbProdutoCaracteristicas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_produto_caracter', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('caracter_id')->unsigned();
            $table->string('nome', 255);
            $table->string('valor', 255);
            $table->timestamps();
            $table->foreign('caracter_id')->references('id')->on('tb_categoria_caracter');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_produto_caracter');
    }
}
