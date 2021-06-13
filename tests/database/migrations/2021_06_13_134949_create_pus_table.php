<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pus', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('entidad_id');
            $table->string('destino', 200)->nullable();
            $table->string('url', 50)->nullable();
            $table->string('us', 150)->nullable();
            $table->string('us2', 50)->nullable();
            $table->string('ps')->nullable();
            $table->string('observaciones')->nullable();
            $table->timestamps();
            $table->foreign('entidad_id', 'pus_entidad_id_foreign')->references('id')->on('entidades')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pus');
    }
}
