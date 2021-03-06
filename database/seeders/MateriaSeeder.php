<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Materia;
class MateriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $materias =
        [
            ['nombre'=>"ENERGÍA, DESARROLLO Y SISTEMAS ELECTRICOS",	'sigla'=> "MEC 3501", 'credito'=>3],
            ['nombre'=>"INTRODUCCIÓN, EVALUACIÓN DEL RECURSO SOLAR Y RADIOMETRÍA",'sigla'=> "MEC 3502", 'credito'=>3],
            ['nombre'=>"ENERGÍA SOLAR FOTOVOLTAICA",'sigla'=> "MEC 3503", 'credito'=>3],
            ['nombre'=>"ENERGÍA EOLICA Y GEOTÉRMICA",'sigla'=> "MEC 3504", 'credito'=>3],
            ['nombre'=>"BIOENERGIA",'sigla'=> "MEC 3505", 'credito'=>3],
            ['nombre'=>"ENERGIA SOLAR A BAJA TEMPERATURA Y CONCETOS DE OPTICA Y TERMODINÁMICA AVANZADA",'sigla'=> "MEC 3506", 'credito'=>3],
            ['nombre'=>"SOLAR TEMICA DE MEDIA Y ALTA TEMPERATURA",'sigla'=> "MEC 3507", 'credito'=>3.5],
            ['nombre'=>"MODELAMIENTO EXPERIMENTAL",'sigla'=> "MEC 3508", 'credito'=>3.5],
            ['nombre'=>"INTEGRACION DE LAS ENERGIAS RENOVABLES AL SIN",'sigla'=> "MEC 3509", 'credito'=>3.5],
            ['nombre'=>"LEGISLACION AMBIENTAL ENERGETICA",'sigla'=> "MEC 3510", 'credito'=>3.5],
            ['nombre'=>"EFICIENCIA Y AUDITORIA ENERGETICA",'sigla'=> "MEC 3511", 'credito'=>3.5],
            ['nombre'=>"ARQUITECTURA BIOCLIMATICA",'sigla'=> "MEC 3512", 'credito'=>3.5],
            ['nombre'=>"DESRROLLO DE LA TESIS DE MAESTRIA",'sigla'=> "MEC 3513", 'credito'=>21]
            
        ];
        foreach ($materias as $materia) {
            Materia::create($materia);
        }
    }
}
