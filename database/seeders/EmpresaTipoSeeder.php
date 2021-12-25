<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class EmpresaTipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('entidad_tipos')->delete();

        \DB::table('entidad_tipos')->insert(array (
            1 => array ('id' => 1,'entidadtipo' => 'Pyme',),
            2 => array ('id' => 2,'entidadtipo' => 'Autónomo',),
            3 => array ('id' => 3,'entidadtipo' => 'Contacto',),
            4 => array ('id' => 4,'entidadtipo' => 'Gran Empresa',),
        ));
    }
}
