<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AdicionarCamposEnderecoPedido extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tb_pedido', function(Blueprint $table) {
            $table->string('entrega_estado', 255);
            $table->string('entrega_cidade', 255);
            $table->string('entrega_logradouro', 255);
            $table->string('entrega_numero', 10);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tb_pedido', function(Blueprint $table) {
            $table->dropColumn('entega_estado');
            $table->dropColumn('entega_cidade');
            $table->dropColumn('entega_logradouro');
            $table->dropColumn('entega_numero');
        });
    }
}
