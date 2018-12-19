<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePedidoItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_pedido_item', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pedido_id')->unsigned();
            $table->integer('produto_id')->unsigned();
            $table->enum('status', ['RE', 'PA', 'CA']);
            $table->decimal('valor', 6, 2)->default(0);
            $table->timestamps();
            $table->foreign('pedido_id')->references('id')->on('tb_pedido');
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
        Schema::dropIfExists('tb_pedido_item');
    }
}
