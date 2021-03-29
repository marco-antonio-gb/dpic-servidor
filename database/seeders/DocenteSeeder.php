<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Usuario;

class DocenteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $docentes =
        [
            ['paterno' => 'DEL BARCO', 'materno' => 'GAMARRA', 'nombres'=>'ROBERTO','ci'=>'12345665','ci_ext'=>'OR','profesion'=>'INGENIERO INDUSTRIAL','email'=>'email2@admin.com','password'=>bcrypt('admin')],
            ['paterno' => 'DAVALOS', 'materno' => '', 'nombres'=>'LUZ','ci'=>'1234567','ci_ext'=>'OR','profesion'=>'INGENIERO INDUSTRIAL','email'=>'email3@admin.com','password'=>bcrypt('admin')],
            ['paterno' => 'PUENTE', 'materno' => 'CHANDIA', 'nombres'=>'ALEJANDRA M.','ci'=>'12345678','ci_ext'=>'OR','profesion'=>'INGENIERO INDUSTRIAL','email'=>'email4@admin.com','password'=>bcrypt('admin')],
            ['paterno' => 'MARDONES', 'materno' => 'MORALES', 'nombres'=>'RENE ORLANDO','ci'=>'92345678','ci_ext'=>'OR','profesion'=>'INGENIERO INDUSTRIAL','email'=>'email5@admin.com','password'=>bcrypt('admin')],
            ['paterno' => 'SOTO', 'materno' => 'GONZALES', 'nombres'=>'EDUARDO ANTONIO','ci'=>'98345678','ci_ext'=>'OR','profesion'=>'INGENIERO INDUSTRIAL','email'=>'email6@admin.com','password'=>bcrypt('admin')],
            ['paterno' => 'VELARDE', 'materno' => 'ARAMAYO', 'nombres'=>'DIEGO JAVIER','ci'=>'98745678','ci_ext'=>'OR','profesion'=>'INGENIERO INDUSTRIAL','email'=>'email7@admin.com','password'=>bcrypt('admin')],
            ['paterno' => 'SALAS', 'materno' => 'CAZON', 'nombres'=>'MILTON ANTONIO','ci'=>'98765678','ci_ext'=>'OR','profesion'=>'INGENIERO INDUSTRIAL','email'=>'email8@admin.com','password'=>bcrypt('admin')],
            ['paterno' => 'VILLAROEL', 'materno' => 'PENARANDA', 'nombres'=>'LUIS ANTONIO','ci'=>'98764678','ci_ext'=>'OR','profesion'=>'INGENIERO INDUSTRIAL','email'=>'email9@admin.com','password'=>bcrypt('admin')],
            ['paterno' => 'DELGADO', 'materno' => 'HERNANDEZ', 'nombres'=>'DAVID JOAQUIN','ci'=>'98764578','ci_ext'=>'OR','profesion'=>'INGENIERO INDUSTRIAL','email'=>'email10@admin.com','password'=>bcrypt('admin')],
            ['paterno' => 'CLAROS', 'materno' => 'VARGAS', 'nombres'=>'HENRY','ci'=>'98764378','ci_ext'=>'OR','profesion'=>'INGENIERO INDUSTRIAL','email'=>'email11@admin.com','password'=>bcrypt('admin')],
            ['paterno' => 'VILLAROEL', 'materno' => 'CASTRO', 'nombres'=>'GENNER ALVARO','ci'=>'98764178','ci_ext'=>'OR','profesion'=>'INGENIERO INDUSTRIAL','email'=>'email12@admin.com','password'=>bcrypt('admin')],
        ];
        foreach ($docentes as $docente) {
            Usuario::create($docente);
        }
    }
}
