<?php

namespace Database\Seeders;

use App\Models\Usuario;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'usuario-list',
            'usuario-create',
            'usuario-edit',
            'usuario-delete',
            #--------------
            'materia-list',
            'materia-create',
            'materia-edit',
            'materia-delete',
            #--------------
            'postgrado-list',
            'postgrado-create',
            'postgrado-edit',
            'postgrado-delete',
            #--------------
            'postgraduante-list',
            'postgraduante-create',
            'postgraduante-edit',
            'postgraduante-delete',
            #--------------
            'calificaciones-list',
            'calificaciones-create',
            'calificaciones-edit',
            'calificaciones-delete',
            #--------------
            'pagos-list',
            'pagos-create',
            'pagos-edit',
            'pagos-delete',
            #--------------
            'reportes-list',
            'reportes-create',
            'reportes-edit',
            'reportes-delete',
           
            #--------------
            'rol-list',
            'rol-create',
            'rol-edit',
            'rol-delete',
            #--------------
            'permiso-list',
            'permiso-create',
            'permiso-edit',
            'permiso-delete',
            #--------------
            'asignar-rol',
            'asignar-permiso',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }


    }
}
