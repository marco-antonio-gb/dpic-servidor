<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoUsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_usuarios')->insert([
            'nombre'=>"Sistemas",
            'descripcion'=>"Acceso total al sistema",
        ]);
        DB::table('tipo_usuarios')->insert([
            'nombre'=>"Docente",
            'descripcion'=>"Personal docente con acceso a ciertos modulos del sistema",
        ]);
        DB::table('tipo_usuarios')->insert([
            'nombre'=>"Docente",
            'descripcion'=>"Personal docente con acceso a ciertos modulos del sistema",
        ]);
    }
}
