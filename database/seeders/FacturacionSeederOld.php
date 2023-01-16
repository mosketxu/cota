<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FacturacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // \DB::table('facturacion')-delete();

        \DB::table('facturacion')-insert([
            ['id'=>'3','serie'=>'16','numfactura'=>'16/00281','fechafactura'=>'2016-08-01','entidad_id'=>'133','metodopago_id'=>'1','fechavencimiento'=>'2016-08-11','mail'=>'alex.arregui@hotmail.es','refcliente'=>''],
        ]);
    }
}
