<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BootstrapRelations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vaga_emprego', function (Blueprint $table) {
            $table->foreign('empresa_id')->references('id')->on('empresa');
            $table->foreign('regime_contratacao_id')->references('id')->on('regime_contratacao');
        });


        Schema::table('vaga_emprego_beneficio', function (Blueprint $table) {
            $table->foreign('vaga_emprego_id')->references('id')->on('vaga_emprego')->onDelete('cascade');
            $table->foreign('beneficio_id')->references('id')->on('beneficio');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vaga_emprego', function (Blueprint $table) {
            $table->dropForeign(['empresa_id', 'regime_contratacao_id']);
        });


        Schema::table('vaga_emprego_beneficio', function (Blueprint $table) {
            $table->dropForeign(['vaga_emprego_id', 'beneficio_id']);
        });
    }
}
