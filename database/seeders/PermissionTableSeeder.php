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
            ['name'=>'usuario-list','desc'=>'Permite la obtencion de una lista de usuarios registrados en el sistema'],
            ['name'=>'usuario-create','desc'=>'Permite la creacion de un nuevo usuario'],
            ['name'=>'usuario-edit','desc'=>'Permite modificar la informacion de un usuario registrado'],
            ['name'=>'usuario-delete','desc'=>'Permite eliminar el registro de un usuario'],
            ['name'=>'materia-list','desc'=>'Permite la obtencion de una lista de Materias registradas en el sistema'],
            ['name'=>'materia-create','desc'=>'Permite la creacion de una nueva materia'],
            ['name'=>'materia-edit','desc'=>'Permite modificar la informacion de una materia'],
            ['name'=>'materia-delete','desc'=>'Permite eliminar el registro de una materia'],
            ['name'=>'postgrado-list','desc'=>'Permite la obtencion de una lista de Postgrados registrados en el sistema'],
            ['name'=>'postgrado-create','desc'=>'Permite la creacion de un nuevo Postgrado'],
            ['name'=>'postgrado-edit','desc'=>'Permite modiicar la informacion de un postgrado'],
            ['name'=>'postgrado-delete','desc'=>'Permite eliminar el registro de un Postgrado'],
            ['name'=>'postgraduante-list','desc'=>'Permite la obtencion de una lista de Postgraduantes registrados en el sistema'],
            ['name'=>'postgraduante-create','desc'=>'Permite la creacion de un nuevo Postgraduante'],
            ['name'=>'postgraduante-edit','desc'=>'Permite modificar la inforamcion de un Postgraduante'],
            ['name'=>'postgraduante-delete','desc'=>'Permite eliminar el registro de un Postgraduante'],
            ['name'=>'calificaciones-list','desc'=>'Permite la obtencion de una lista de Calificaciones registradas en el sistema'],
            ['name'=>'calificaciones-create','desc'=>'Permite la creacion de un nuevo Calificacion'],
            ['name'=>'calificaciones-edit','desc'=>'Permite modificar la inforamcion de un Calificacion'],
            ['name'=>'calificaciones-delete','desc'=>'Permite eliminar el registro de un Calificacion'],
            ['name'=>'pagos-list','desc'=>'Permite la obtencion de una lista de Pagos registrados en el sistema'],
            ['name'=>'pagos-create','desc'=>'Permite la creacion de un nuevo Pego'],
            ['name'=>'pagos-edit','desc'=>'Permite modificar la inforamcion de un Pego'],
            ['name'=>'pagos-delete','desc'=>'Permite eliminar el registro de un Pego'],
            ['name'=>'reportes-calificacion','desc'=>'Permite la obtencion de un Reporte detallado de las calificaciones, ya sea por Asignatura o Personal'],
            ['name'=>'reportes-pagos','desc'=>'Permite la obtencion de un reporte detallado de todos los pagos, ya sea General o Personal'],
            ['name'=>'rol-list','desc'=>'Permite la obtencion de una lista de Roles registrados en el sistema'],
            ['name'=>'rol-create','desc'=>'Permite la creacion de un nuevo Rol'],
            ['name'=>'rol-edit','desc'=>'Permite modificar la inforamcion de un Rol'],
            ['name'=>'rol-delete','desc'=>'Permite eliminar el registro de un Rol'],
            ['name'=>'permiso-list','desc'=>'Permite la obtencion de una lista de Permisos registrados en el sistema'],
            ['name'=>'permiso-create','desc'=>'Permite la creacion de un nuevo Permiso'],
            ['name'=>'permiso-edit','desc'=>'Permite modificar la inforamcion de un Permiso'],
            ['name'=>'permiso-delete','desc'=>'Permite eliminar el registro de un Permiso'],
            ['name'=>'asignar-rol','desc'=>'Permite asignar un Rol a un Usuario del sistema'],
            ['name'=>'asignar-permiso','desc'=>'Permite Asignar Permisos a los Roles del sistema'],
        ];
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission['name'],'descripcion'=>$permission['desc']]);
        }
    }
}
