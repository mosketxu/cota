<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategoriasTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('categorias')->delete();
        
        \DB::table('categorias')->insert(array (
            0 => 
            array (
                'id' => 1,
                'categoria' => 'Contabilidad',
            ),
            1 => 
            array (
                'id' => 3,
                'categoria' => 'Amortización',
            ),
            2 => 
            array (
                'id' => 10,
                'categoria' => 'Alquiler',
            ),
            3 => 
            array (
                'id' => 12,
                'categoria' => 'Profesionales',
            ),
            4 => 
            array (
                'id' => 14,
                'categoria' => 'Nominas',
            ),
            5 => 
            array (
                'id' => 16,
                'categoria' => 'Autónomos',
            ),
            6 => 
            array (
                'id' => 20,
                'categoria' => 'Suministros',
            ),
            7 => 
            array (
                'id' => 22,
                'categoria' => 'Leasing',
            ),
            8 => 
            array (
                'id' => 30,
                'categoria' => 'Gastos Negocio',
            ),
            9 => 
            array (
                'id' => 35,
                'categoria' => 'Otros Gastos',
            ),
            10 => 
            array (
                'id' => 40,
                'categoria' => 'Desplazamiento',
            ),
            11 => 
            array (
                'id' => 45,
                'categoria' => 'Dietas',
            ),
            12 => 
            array (
                'id' => 100,
                'categoria' => 'Ventas',
            ),
        ));
        
        
    }
}