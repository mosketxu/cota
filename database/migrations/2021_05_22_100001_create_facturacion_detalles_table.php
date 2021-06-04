<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacturacionDetallesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facturacion_detalles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('facturacion_id')->constrained('facturacion')->onDelete('cascade');;
            $table->integer('orden')->default(0);
            $table->integer('tipo')->default(0);
            $table->string('concepto')->nullable();
            $table->integer('unidades')->default(1);
            $table->float('coste',15,2)->default(0);
            $table->decimal('iva',15,2)->default(0);
            $table->integer('subcuenta')->default('705000');
            $table->integer('pagadopor')->default(0);
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
        Schema::dropIfExists('facturacion_detalles');
    }
}
