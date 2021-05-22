<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacturacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facturacion', function (Blueprint $table) {
            $table->id();
            $table->foreignId('entidad_id')->constrained('entidades');
            $table->string('numfactura',9)->index()->nullable();
            $table->date('fechafactura')->nullable();
            $table->date('fechavencimiento')->nullable();
            $table->integer('metodopago_id')->nullable();
            $table->string('refcliente',50)-> nullable();
            $table->string('mail')->nullable();
            $table->boolean('enviar')->default(1);
            $table->boolean('enviada')->default(0);
            $table->boolean('pagada')->default(0);
            $table->integer('facturable')->default(1);
            $table->integer('asiento')->default(0);
            $table->date('fechaasiento')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('facturacion');
    }
}
