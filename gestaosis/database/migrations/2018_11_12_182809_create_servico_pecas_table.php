<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicoPecasTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('servico_pecas', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('servico_id')->unsigned();
            $table->foreign('servico_id')->references('id')->on('servicos')->onDelete('cascade');
            $table->integer('peca_id')->unsigned();
            $table->foreign('peca_id')->references('id')->on('pecas')->onDelete('cascade');
            $table->integer('quantidade');
            $table->double('valorSomaIten');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('servico_pecas');
    }

}
