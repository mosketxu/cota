<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CiclosTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('ciclos')->delete();

        \DB::table('ciclos')->insert([
             ['id'=>'1','ciclo'=>'Mensual'],
             ['id'=>'3','ciclo'=>'Trimestral'],
             ['id'=>'12','ciclo'=>'Anual'],
             ['id'=>'20','ciclo'=>'Puntual'],
        ]);


    }
}
