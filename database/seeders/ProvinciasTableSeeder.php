<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProvinciasTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('provincias')->delete();

        \DB::table('provincias')->insert(array (
            0 =>
            array (
                'id' => '01',
                'provincia' => 'ALABA',
            ),
            1 =>
            array (
                'id' => '02',
                'provincia' => 'ALBACETE',
            ),
            2 =>
            array (
                'id' => '03',
                'provincia' => 'ALICANTE',
            ),
            3 =>
            array (
                'id' => '04',
                'provincia' => 'ALMERÍA',
            ),
            4 =>
            array (
                'id' => '05',
                'provincia' => 'ÁVILA',
            ),
            5 =>
            array (
                'id' => '06',
                'provincia' => 'BADAJOZ',
            ),
            6 =>
            array (
                'id' => '07',
                'provincia' => 'BALEARES',
            ),
            7 =>
            array (
                'id' => '08',
                'provincia' => 'BARCELONA',
            ),
            8 =>
            array (
                'id' => '09',
                'provincia' => 'BURGOS',
            ),
            9 =>
            array (
                'id' => '10',
                'provincia' => 'CÁCERES',
            ),
            10 =>
            array (
                'id' => '11',
                'provincia' => 'CÁDIZ',
            ),
            11 =>
            array (
                'id' => '12',
                'provincia' => 'CASTELLÓN',
            ),
            12 =>
            array (
                'id' => '13',
                'provincia' => 'C.REAL',
            ),
            13 =>
            array (
                'id' => '14',
                'provincia' => 'CÓRDOBA',
            ),
            14 =>
            array (
                'id' => '15',
                'provincia' => 'A CORUÑA',
            ),
            15 =>
            array (
                'id' => '16',
                'provincia' => 'CUENCA',
            ),
            16 =>
            array (
                'id' => '17',
                'provincia' => 'GIRONA',
            ),
            17 =>
            array (
                'id' => '18',
                'provincia' => 'GRANADA',
            ),
            18 =>
            array (
                'id' => '19',
                'provincia' => 'GUADALAJARA',
            ),
            19 =>
            array (
                'id' => '20',
                'provincia' => 'GUIPÚZCOA',
            ),
            20 =>
            array (
                'id' => '21',
                'provincia' => 'HUELVA',
            ),
            21 =>
            array (
                'id' => '22',
                'provincia' => 'HUESCA',
            ),
            22 =>
            array (
                'id' => '23',
                'provincia' => 'JAÉN',
            ),
            23 =>
            array (
                'id' => '24',
                'provincia' => 'LEÓN',
            ),
            24 =>
            array (
                'id' => '25',
                'provincia' => 'LLEIDA',
            ),
            25 =>
            array (
                'id' => '26',
                'provincia' => 'LA RIOJA',
            ),
            26 =>
            array (
                'id' => '27',
                'provincia' => 'LUGO',
            ),
            27 =>
            array (
                'id' => '28',
                'provincia' => 'MADRID',
            ),
            28 =>
            array (
                'id' => '29',
                'provincia' => 'MÁLAGA',
            ),
            29 =>
            array (
                'id' => '30',
                'provincia' => 'MURCIA',
            ),
            30 =>
            array (
                'id' => '31',
                'provincia' => 'NAVARRA',
            ),
            31 =>
            array (
                'id' => '32',
                'provincia' => 'ORENSE',
            ),
            32 =>
            array (
                'id' => '33',
                'provincia' => 'ASTURIAS',
            ),
            33 =>
            array (
                'id' => '34',
                'provincia' => 'PALENCIA',
            ),
            34 =>
            array (
                'id' => '35',
                'provincia' => 'LAS PALMAS',
            ),
            35 =>
            array (
                'id' => '36',
                'provincia' => 'PONTEVEDRA',
            ),
            36 =>
            array (
                'id' => '37',
                'provincia' => 'SALAMANCA',
            ),
            37 =>
            array (
                'id' => '38',
                'provincia' => 'TENERIFE',
            ),
            38 =>
            array (
                'id' => '39',
                'provincia' => 'SANTANDER',
            ),
            39 =>
            array (
                'id' => '40',
                'provincia' => 'SEGOVIA',
            ),
            40 =>
            array (
                'id' => '41',
                'provincia' => 'SEVILLA',
            ),
            41 =>
            array (
                'id' => '42',
                'provincia' => 'SORIA',
            ),
            42 =>
            array (
                'id' => '43',
                'provincia' => 'TARRAGONA',
            ),
            43 =>
            array (
                'id' => '44',
                'provincia' => 'TERUEL',
            ),
            44 =>
            array (
                'id' => '45',
                'provincia' => 'TOLEDO',
            ),
            45 =>
            array (
                'id' => '46',
                'provincia' => 'VALENCIA',
            ),
            46 =>
            array (
                'id' => '47',
                'provincia' => 'VALLADOLID',
            ),
            47 =>
            array (
                'id' => '48',
                'provincia' => 'VIZCAYA',
            ),
            48 =>
            array (
                'id' => '49',
                'provincia' => 'ZAMORA',
            ),
            49 =>
            array (
                'id' => '50',
                'provincia' => 'ZARAGOZA',
            ),
            50 =>
            array (
                'id' => '51',
                'provincia' => 'CEUTA',
            ),
            51 =>
            array (
                'id' => '52',
                'provincia' => 'MELILLA',
            ),
            52 =>
            array (
                'id' => '57',
                'provincia' => 'ANDORRA',
            ),
            53 =>
            array (
                'id' => '99',
                'provincia' => '-',
            ),
        ));


    }
}
