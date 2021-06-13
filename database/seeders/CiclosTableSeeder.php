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
        
        \DB::table('ciclos')->insert(array (
            0 => 
            array (
                'id' => 0,
                'ciclo' => 'No def',
            ),
            1 => 
            array (
                'id' => 1,
                'ciclo' => 'Mensual',
            ),
            2 => 
            array (
                'id' => 3,
                'ciclo' => 'Trimestral',
            ),
            3 => 
            array (
                'id' => 12,
                'ciclo' => 'Anual',
            ),
            4 => 
            array (
                'id' => 13,
                'ciclo' => 'Mes/Trim',
            ),
            5 => 
            array (
                'id' => 20,
                'ciclo' => 'Puntual',
            ),
            6 => 
            array (
                'id' => 34,
                'ciclo' => 'Tri/Cuatri',
            ),
        ));
        
        
    }
}