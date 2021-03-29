<?php

namespace Database\Seeders;

use App\Models\Usuario;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleToUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        // $admin = Usuario::find(1);
        // $admin->assignRole('Sistemas');
        $users=[2,3,4,5,6,7,8,9,10,11];
        foreach ($users as $key => $value) {
            $user=Usuario::find($value);
            $user->assignRole('Docente');
        }
        $user = Usuario::find(1);
        $role = Role::create(['name' => 'Sistemas','descripcion'=>'Usuario con privilegios totales en el sistema DPIC-FNI']);
        $permissions = Permission::pluck('id','id')->all();
        $role->syncPermissions($permissions);
        $user->assignRole([$role->id]);
    }
}
