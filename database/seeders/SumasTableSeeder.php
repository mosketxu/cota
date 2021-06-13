<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SumasTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('sumas')->delete();
        
        \DB::table('sumas')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nombre' => 'Marta',
                'tfno' => '659501389',
                'email' => 'marta.ruiz@sumaempresa.com',
                'created_at' => '2020-04-10 19:35:40',
                'updated_at' => '2020-04-10 19:35:40',
            ),
            1 => 
            array (
                'id' => 2,
                'nombre' => 'Susana',
                'tfno' => '',
                'email' => 'susana.martinez@sumaempresa.com',
                'created_at' => '2020-04-10 19:35:40',
                'updated_at' => '2020-04-10 19:35:40',
            ),
            2 => 
            array (
                'id' => 3,
                'nombre' => 'Alex',
                'tfno' => '638122614',
                'email' => 'alex.arregui@sumaempresa.com',
                'created_at' => '2020-04-10 19:35:40',
                'updated_at' => '2020-04-10 19:35:40',
            ),
            3 => 
            array (
                'id' => 4,
                'nombre' => 'Dolors',
                'tfno' => '',
                'email' => 'dolors.celdran@sumaempresa.com',
                'created_at' => '2020-04-10 19:35:40',
                'updated_at' => '2020-04-10 19:35:40',
            ),
            4 => 
            array (
                'id' => 5,
                'nombre' => 'Miriam',
                'tfno' => '',
                'email' => 'miriam.marin@sumaempresa.com',
                'created_at' => '2020-04-10 19:35:40',
                'updated_at' => '2020-04-10 19:35:40',
            ),
        ));
        
        
    }
}