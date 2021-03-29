<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name'=>"Administrador",
            'guard_name'=>"api",
            'descripcion'=>"Usuario con provilegios globales, con acceso total al sistema de administracion, con excepcion de los modulos de permisos y roles del sistema",
        ]);
      
        DB::table('roles')->insert([
            'name'=>"Secretaria",
            'guard_name'=>"api",
            'descripcion'=>"Usuario que podra realizar inscripciones, recepecion de pagos, emision de certificados de pagos concluidos y certificados de calificaciones",
        ]);
        DB::table('roles')->insert([
            'name'=>"Encargado",
            'guard_name'=>"api",
            'descripcion'=>"Usuario con privilegios para emitir unicamente reportes acerca de los pagos, calificaciones y ver postgraduantes inscritos.",
        ]);
        DB::table('roles')->insert([
            'name'=>"Docente",
            'guard_name'=>"api",
            'descripcion'=>"Usuario con privilegios para poder gestionar las calificaiones de los postgraduantes",
        ]);
        
        // DB::table('roles')->insert([
        //     'name'=>"Sistemas",
        //     'guard_name'=>"api",
        //     'descripcion'=>"Usuario con privilegios totales en el sistema DPIC-FNI",
        // ]);
    }
}
