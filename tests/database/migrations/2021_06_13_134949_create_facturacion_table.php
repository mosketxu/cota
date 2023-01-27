<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->unsignedBigInteger('entidad_id');
            $table->string('serie', 2)->nullable();
            $table->integer('numfactura')->nullable();
            $table->date('fechafactura')->nullable();
            $table->date('fechavencimiento')->nullable();
            $table->integer('metodopago_id')->nullable();
            $table->string('refcliente', 50)->nullable();
            $table->string('mail')->nullable();
            $table->boolean('enviar')->default(1);
            $table->boolean('enviada')->default(0);
            $table->boolean('pagada')->default(0);
            $table->boolean('facturada')->nullable()->default(0);
            $table->integer('facturable')->default(1);
            $table->integer('asiento')->nullable();
            $table->date('fechaasiento')->nullable();
            $table->longText('observaciones')->nullable();
            $table->longText('notas')->nullable();
            $table->string('ruta', 100)->nullable();
            $table->string('fichero', 90)->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
            $table->foreign('entidad_id', 'facturacion_entidad_id_foreign')->references('id')->on('entidades');
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
