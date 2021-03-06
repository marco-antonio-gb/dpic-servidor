<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostgradoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('postgrados')->insert([
            'nombre'=>"MAESTRIA EN ENERGIA RENOVABLE Y EFICIENCIA ENERGÉTICA",
            'fecha_inicio'=>'2021-12-12',
            'fecha_final'=>'2021-12-12',
            'cantidad_pagos'=>8,
            'precio'=>15000,
            'gestion'=>2021,
            'nivel_id'=>2
        ]);
        DB::table('postgrados')->insert([
            'nombre'=>"ESPECIALIZACION EN SEGURIDAD INDUSTRIAL Y SALUD OCUPACIONAL",
            'fecha_inicio'=>'2021-12-12',
            'fecha_final'=>'2021-12-12',
            'cantidad_pagos'=>8,
            'precio'=>16000,
            'gestion'=>2021,
            'nivel_id'=>3
        ]);
        DB::table('postgrados')->insert([
            'nombre'=>"MAESTRIA EN PROCESAMIENTO DE RECURSOS EVAPORITICOS",
            'fecha_inicio'=>'2021-12-12',
            'fecha_final'=>'2021-12-12',
            'cantidad_pagos'=>8,
            'precio'=>17000,
            'gestion'=>2021,
            'nivel_id'=>2
        ]);
        DB::table('postgrados')->insert([
            'nombre'=>"MAESTRIA EN METALURGIA EXTRACTIVA Y SU CONTROL AMBIENTAL",
            'fecha_inicio'=>'2021-12-12',
            'fecha_final'=>'2021-12-12',
            'cantidad_pagos'=>8,
            'precio'=>18000,
            'gestion'=>2021,
            'nivel_id'=>2
        ]);
        DB::table('postgrados')->insert([
            'nombre'=>"MAESTRIA EN INGENIERIA ESTRUCTURAL",
            'fecha_inicio'=>'2021-12-12',
            'fecha_final'=>'2021-12-12',
            'cantidad_pagos'=>8,
            'precio'=>19000,
            'gestion'=>2021,
            'nivel_id'=>2
        ]);
        DB::table('postgrados')->insert([
            'nombre'=>"MAESTRIA EN INGENIERIA INDUSTRIAL",
            'fecha_inicio'=>'2021-12-12',
            'fecha_final'=>'2021-12-12',
            'cantidad_pagos'=>8,
            'precio'=>20000,
            'gestion'=>2021,
            'nivel_id'=>2
        ]);
    }
}
