<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicosTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('servicos', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('equipamento_id')->unsigned();
            $table->foreign('equipamento_id')->references('id')->on('equipamentos')->onDelete('cascade');
            $table->date('data');
            $table->integer('totalecas');
            $table->double('maodeobra');
            $table->double('valorFinal');
            $table->integer('itens');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('servicos');
    }

}
