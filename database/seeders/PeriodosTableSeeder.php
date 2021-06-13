<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PeriodosTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('periodos')->delete();
        
        \DB::table('periodos')->insert(array (
            0 => 
            array (
                'id' => 1,
                'tipo' => 0,
                'perI' => 1,
                'perF' => 1,
                'periodo' => 'Enero',
            ),
            1 => 
            array (
                'id' => 2,
                'tipo' => 0,
                'perI' => 2,
                'perF' => 2,
                'periodo' => 'Febrero',
            ),
            2 => 
            array (
                'id' => 3,
                'tipo' => 0,
                'perI' => 3,
                'perF' => 3,
                'periodo' => 'Marzo',
            ),
            3 => 
            array (
                'id' => 4,
                'tipo' => 0,
                'perI' => 4,
                'perF' => 4,
                'periodo' => 'Abril',
            ),
            4 => 
            array (
                'id' => 5,
                'tipo' => 0,
                'perI' => 5,
                'perF' => 5,
                'periodo' => 'Mayo',
            ),
            5 => 
            array (
                'id' => 6,
                'tipo' => 0,
                'perI' => 6,
                'perF' => 6,
                'periodo' => 'Junio',
            ),
            6 => 
            array (
                'id' => 7,
                'tipo' => 0,
                'perI' => 7,
                'perF' => 7,
                'periodo' => 'Julio',
            ),
            7 => 
            array (
                'id' => 8,
                'tipo' => 0,
                'perI' => 8,
                'perF' => 8,
                'periodo' => 'Agosto',
            ),
            8 => 
            array (
                'id' => 9,
                'tipo' => 0,
                'perI' => 9,
                'perF' => 9,
                'periodo' => 'Septiembre',
            ),
            9 => 
            array (
                'id' => 10,
                'tipo' => 0,
                'perI' => 10,
                'perF' => 10,
                'periodo' => 'Octubre',
            ),
            10 => 
            array (
                'id' => 11,
                'tipo' => 0,
                'perI' => 11,
                'perF' => 11,
                'periodo' => 'Noviembre',
            ),
            11 => 
            array (
                'id' => 12,
                'tipo' => 0,
                'perI' => 12,
                'perF' => 12,
                'periodo' => 'Diciembre',
            ),
            12 => 
            array (
                'id' => 13,
                'tipo' => 1,
                'perI' => 1,
                'perF' => 3,
                'periodo' => 'T1',
            ),
            13 => 
            array (
                'id' => 14,
                'tipo' => 1,
                'perI' => 4,
                'perF' => 6,
                'periodo' => 'T2',
            ),
            14 => 
            array (
                'id' => 15,
                'tipo' => 1,
                'perI' => 7,
                'perF' => 9,
                'periodo' => 'T3',
            ),
            15 => 
            array (
                'id' => 16,
                'tipo' => 1,
                'perI' => 10,
                'perF' => 12,
                'periodo' => 'T4',
            ),
            16 => 
            array (
                'id' => 17,
                'tipo' => 1,
                'perI' => 1,
                'perF' => 12,
                'periodo' => 'Selecciona',
            ),
        ));
        
        
    }
}