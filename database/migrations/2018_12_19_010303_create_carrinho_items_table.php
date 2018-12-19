<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarrinhoItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_carrinho_item', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('carrinho_id')->unsigned();
            $table->integer('produto_id')->unsigned();
            $table->decimal('valor', 6, 2)->default(0);
            $table->timestamps();
            $table->foreign('carrinho_id')->references('id')->on('tb_carrinho');
            $table->foreign('produto_id')->references('id')->on('tb_produtos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_carrinho_item');
    }
}
