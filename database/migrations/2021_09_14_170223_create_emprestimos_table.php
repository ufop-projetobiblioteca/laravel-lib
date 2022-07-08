<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmprestimosTable extends Migration
{
    /**
     * Run the migrations.
     * 
     * @return void
     */
    public function up()
    {
        Schema::create('emprestimos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('aluno_id');
            $table->unsignedBigInteger('livro_id');
            $table->date('devolucao');
            $table->boolean('em_atraso');
            $table->boolean('renovado');
            $table->boolean('ativo');
            $table->timestamps();

            $table->foreign('aluno_id')
                ->references('id')
                ->on('alunos')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('livro_id')
                ->references('id')
                ->on('livros')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('emprestimos');
    }
}
