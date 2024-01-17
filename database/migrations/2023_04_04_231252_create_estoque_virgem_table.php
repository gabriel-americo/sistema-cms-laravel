<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstoqueVirgemTable extends Migration
{
    public function up()
    {
        Schema::create('estoque_virgem', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('qtd');
            $table->foreignId('tamanho_id')->constrained('tamanhos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('tipo_produto_id')->constrained('tipo_produtos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('cor_camiseta_id')->constrained('cor_camisetas')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('estoque_virgem');
    }
}
