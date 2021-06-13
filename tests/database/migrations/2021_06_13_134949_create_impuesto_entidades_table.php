<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImpuestoEntidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('impuesto_entidades', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('entidad_id');
            $table->unsignedBigInteger('impuesto_id');
            $table->unsignedBigInteger('ciclo_id');
            $table->string('observaciones')->nullable();
            $table->timestamps();
            $table->foreign('ciclo_id', 'impuesto_entidades_ciclo_id_foreign')->references('id')->on('ciclos');
            $table->foreign('entidad_id', 'impuesto_entidades_entidad_id_foreign')->references('id')->on('entidades')->onDelete('cascade');
            $table->foreign('impuesto_id', 'impuesto_entidades_impuesto_id_foreign')->references('id')->on('impuestos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('impuesto_entidades');
    }
}
