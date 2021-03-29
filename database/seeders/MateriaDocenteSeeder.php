<?php

namespace Database\Seeders;

use App\Models\DocenteMateria;
use Illuminate\Database\Seeder;

class MateriaDocenteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $materias_docente =
        [
            ['materia_id'=>1,	'docente_id'=> 2, 'postgrado_id'=>1],
            ['materia_id'=>2,	'docente_id'=> 3, 'postgrado_id'=>1],
            ['materia_id'=>3,	'docente_id'=> 4, 'postgrado_id'=>1],
            ['materia_id'=>4,	'docente_id'=> 5, 'postgrado_id'=>1],
            ['materia_id'=>5,	'docente_id'=> 6, 'postgrado_id'=>1],
            ['materia_id'=>6,	'docente_id'=> 7, 'postgrado_id'=>1],
            ['materia_id'=>7,	'docente_id'=> 8, 'postgrado_id'=>1],
            ['materia_id'=>8,	'docente_id'=> 9, 'postgrado_id'=>1],
            ['materia_id'=>9,	'docente_id'=> 10, 'postgrado_id'=>1],
            ['materia_id'=>10,	'docente_id'=> 11, 'postgrado_id'=>1],
            ['materia_id'=>11,	'docente_id'=> 12, 'postgrado_id'=>1],
            ['materia_id'=>12,	'docente_id'=> 2, 'postgrado_id'=>1],
            ['materia_id'=>13,	'docente_id'=> 5, 'postgrado_id'=>1],
            
            
        ];
        foreach ($materias_docente as $asignacion) {
            DocenteMateria::create($asignacion);
        }
    }
}
