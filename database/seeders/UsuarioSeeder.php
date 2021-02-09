<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usuarios')->insert([
            'paterno'=>"GUTIERREZ",
            'materno'=>"BELTRAN",
            'nombres'=>"MARCO ANTONIO",
            'ci'=>"5779557",
            'ci_ext'=>"OR",
            'profesion'=>"INGENIERIA DE SISTEMAS",
            'titulo_abrv'=>"Msc. Ing.",
            'celular'=>"71856386",
            'telefono'=>"5251857",
            'password'=>bcrypt('admin'),
            'email'=>"modem.ff@gmail.com",

        ]);
    }
}
