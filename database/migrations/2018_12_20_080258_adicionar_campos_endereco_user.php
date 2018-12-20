<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AdicionarCamposEnderecoUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function(Blueprint $table) {
            $table->string('estado', 255);
            $table->string('cidade', 255);
            $table->string('logradouro', 255);
            $table->string('numero', 10);
            $table->smallInteger('user_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function(Blueprint $table) {
            $table->dropColumn('estado');
            $table->dropColumn('cidade');
            $table->dropColumn('logradouro');
            $table->dropColumn('numero');
            $table->dropColumn('user_type');
        });
    }
}
