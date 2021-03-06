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
            'nombres'=>"ROLANDO",
            'paterno'=>"LUCAS",
            'materno'=>"MAMANI",
            'ci'=>"123456111",
            'ci_ext'=>"OR",
            'profesion'=>"INGENIERIA DE SISTEMAS",
            'titulo_abrv'=>"*",
            'celular'=>"1234567",
            'telefono'=>"7654321",
            'password'=>bcrypt('admin'),
            'email'=>"admin@admin.com",
            'tipo_usuario_id'=>1
        ]);
        DB::table('usuarios')->insert([
            'nombres'=>"MARIO",
            'paterno'=>"LUCANA",
            'paterno'=>"QUISPE",
            'ci'=>"12342258",
            'ci_ext'=>"OR",
            'profesion'=>"INGENIERIA INFORMATICA",
            'titulo_abrv'=>"*",
            'celular'=>"42252222",
            'telefono'=>"7654321",
            'password'=>bcrypt('admin'),
            'email'=>"admin2@admin.com",
            'tipo_usuario_id'=>2
        ]);
        DB::table('usuarios')->insert([
            'nombres'=>"NEIZA DANIELA",
            'paterno'=>"GONZALES",
            'materno'=>"QUISPE",
            'ci'=>"45645422",
            'ci_ext'=>"OR",
            'profesion'=>"INGENIERIA INFORMATICA",
            'titulo_abrv'=>"*",
            'celular'=>"1234567",
            'telefono'=>"7654321",
            'password'=>bcrypt('admin'),
            'email'=>"admin3@admin.com",
            'tipo_usuario_id'=>3
        ]);
    }
}
