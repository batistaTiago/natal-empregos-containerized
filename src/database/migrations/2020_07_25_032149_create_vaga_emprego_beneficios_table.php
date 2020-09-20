<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVagaEmpregoBeneficiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vaga_emprego_beneficio', function (Blueprint $table) {
            $table->bigIncrements('id');

            /* dados */
            $table->string('valor')->nullable();

            /* relacionamentos */
            $table->unsignedBigInteger('vaga_emprego_id');
            $table->unsignedBigInteger('beneficio_id');

            /* restricoes */
            $table->unique(['vaga_emprego_id', 'beneficio_id']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vaga_emprego_beneficio');
    }
}
