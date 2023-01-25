<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnPeriodoToFacturacionConceptodetallesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('facturacion_conceptodetalles', function (Blueprint $table) {
            $table->string('periodo')->nullable()->after('concepto');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('facturacion_conceptodetalles', function (Blueprint $table) {
            $table->dropColumn('periodo');
        });
    }
}
