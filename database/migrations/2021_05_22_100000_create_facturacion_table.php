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
            $table->string('serie',2)->nullable();
            $table->string('numfactura',9)->nullable();
            $table->date('fechafactura')->nullable();
            $table->date('fechavencimiento')->nullable();
            $table->integer('metodopago_id')->nullable();
            $table->string('refcliente',50)-> nullable();
            $table->string('mail')->nullable();
            $table->boolean('enviar')->default(true);
            $table->boolean('enviada')->default(false);
            $table->boolean('pagada')->default(false);
            $table->integer('facturable')->default(true);
            $table->integer('asiento')->nullable();
            $table->date('fechaasiento')->nullable();
            $table->longText('observaciones')->nullable();
            $table->longText('notas')->nullable();
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
