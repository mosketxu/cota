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
        // \DB::table('facturacion')->delete();

        \DB::table('facturacion')->insert([
            ['id'=>'12016','serie'=>'','numfactura'=>'','fechafactura'=>'2022/03/01','entidad_id'=>'2360','metodopago_id'=>'2','fechavencimiento'=>'2022/03/10','refcliente'=>'','mail'=>'marta.ruiz@sumaempresa.com'],

        ]);
    }
}
