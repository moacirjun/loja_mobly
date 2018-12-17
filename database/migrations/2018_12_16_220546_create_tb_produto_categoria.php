<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbProdutoCategoria extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_produto_categoria', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("produto_id")->unsigned();
            $table->integer("categoria_id")->unsigned();
            $table->timestamps();
            $table->foreign("produto_id")->references("id")->on("tb_produtos");
            $table->foreign("categoria_id")->references("id")->on("tb_categorias");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_produto_categoria');
    }
}
