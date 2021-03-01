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
            'nombres'=>"Rolando",
            'paterno'=>"Paterno",
            'materno'=>"Materno",
            'ci'=>"123456",
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
            'nombres'=>"Rolando",
            'paterno'=>"Paterno",
            'paterno'=>"Materno",
            'ci'=>"12345678",
            'ci_ext'=>"OR",
            'profesion'=>"INGENIERIA INFORMATICA",
            'titulo_abrv'=>"*",
            'celular'=>"1234567",
            'telefono'=>"7654321",
            'password'=>bcrypt('admin'),
            'email'=>"admin2@admin.com",
            'tipo_usuario_id'=>2
        ]);
        DB::table('usuarios')->insert([
            'nombres'=>"Rolando",
            'paterno'=>"Paterno",
            'materno'=>"Materno",
            'ci'=>"123456789",
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
