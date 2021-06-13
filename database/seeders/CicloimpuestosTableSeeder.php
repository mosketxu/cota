<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CicloimpuestosTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('cicloimpuestos')->delete();
        
        \DB::table('cicloimpuestos')->insert(array (
            0 => 
            array (
                'id' => 0,
                'cicloimpuesto' => 'No def',
            ),
            1 => 
            array (
                'id' => 1,
                'cicloimpuesto' => 'Mensual',
            ),
            2 => 
            array (
                'id' => 3,
                'cicloimpuesto' => 'Trimestral',
            ),
            3 => 
            array (
                'id' => 12,
                'cicloimpuesto' => 'Anual',
            ),
            4 => 
            array (
                'id' => 13,
                'cicloimpuesto' => 'Mes/Trim',
            ),
            5 => 
            array (
                'id' => 20,
                'cicloimpuesto' => 'Puntual',
            ),
            6 => 
            array (
                'id' => 34,
                'cicloimpuesto' => 'Tri/Cuatri',
            ),
        ));
        
        
    }
}