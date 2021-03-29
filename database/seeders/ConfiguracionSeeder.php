<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConfiguracionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('configuraciones')->insert([
            'nombre_aplicacion'=>'Sistema de Informacion DPIC-FNI',
            'sigla_aplicacion'=>'SIS-DPIC-FNI',
            'url_institucion'=>'http://www.fni.uto.edu.bo/fni/index.php/dpic',
            'institucion'=>'Dirección de Postgrado e Investigación Científica',
            'direccion'=>'Av. Cnel. Alejandro Dehene entre Av. Jaime Sainz y Calle C. Pinilla Ciudadela Universitaria.',
            'telefono'=>'+591 -2 -52 -74870 Decanatura',
            'correo'=>'fni@uto.edu.bo',
            'version'=>'1.0.070709',
        ]);
    }
}
