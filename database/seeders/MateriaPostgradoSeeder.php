<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MateriaPostgrado;

class MateriaPostgradoSeeder extends Seeder
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
            ['materia_id'=>1,	'postgrado_id'=>1],
            ['materia_id'=>2,	'postgrado_id'=>1],
            ['materia_id'=>3,	'postgrado_id'=>1],
            ['materia_id'=>4,	'postgrado_id'=>1],
            ['materia_id'=>5,	'postgrado_id'=>1],
            ['materia_id'=>6,	'postgrado_id'=>1],
            ['materia_id'=>7,	'postgrado_id'=>1],
            ['materia_id'=>8,	'postgrado_id'=>1],
            ['materia_id'=>9,	'postgrado_id'=>1],
            ['materia_id'=>10,	'postgrado_id'=>1],
            ['materia_id'=>11,	'postgrado_id'=>1],
            ['materia_id'=>12,	'postgrado_id'=>1],
            ['materia_id'=>13,	'postgrado_id'=>1],
            
            
        ];
        foreach ($materias_docente as $asignacion) {
            MateriaPostgrado::create($asignacion);
        }
    }
}
