<?php
namespace Database\Seeders;

use App\Models\Calificacion;
use Illuminate\Database\Seeder;

class CalificacionSeeder extends Seeder
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
            [
                'nota_numerica' => '98',
                'nota_literal' => 'NOVENTA Y OCHO',
                'observacion' => 'Nada..',
                'fecha_registro' => '2021-03-28 23:08:13',
                'materia_id' => '1',
                'docente_id' => '2',
                'postgrado_id' => '1',
                'postgraduante_id' => '1',
            ],
            [
                'nota_numerica' => '98',
                'nota_literal' => 'NOVENTA Y OCHO',
                'observacion' => 'Nada..',
                'fecha_registro' => '2021-03-28 23:08:13',
                'materia_id' => '1',
                'docente_id' => '2',
                'postgrado_id' => '1',
                'postgraduante_id' => '2',
            ],
            [
                'nota_numerica' => '80',
                'nota_literal' => 'OCHENTA',
                'observacion' => 'Nada..',
                'fecha_registro' => '2021-03-28 23:08:13',
                'materia_id' => '1',
                'docente_id' => '2',
                'postgrado_id' => '1',
                'postgraduante_id' => '3',
            ],
            [
                'nota_numerica' => '98',
                'nota_literal' => 'NOVENTA Y OCHO',
                'observacion' => 'Nada..',
                'fecha_registro' => '2021-03-28 23:08:13',
                'materia_id' => '1',
                'docente_id' => '2',
                'postgrado_id' => '1',
                'postgraduante_id' => '4',
            ],
            [
                'nota_numerica' => '98',
                'nota_literal' => 'NOVENTA Y OCHO',
                'observacion' => 'Nada..',
                'fecha_registro' => '2021-03-28 23:08:13',
                'materia_id' => '1',
                'docente_id' => '2',
                'postgrado_id' => '1',
                'postgraduante_id' => '5',
            ],
            [
                'nota_numerica' => '98',
                'nota_literal' => 'NOVENTA Y OCHO',
                'observacion' => 'Nada..',
                'fecha_registro' => '2021-03-28 23:08:13',
                'materia_id' => '1',
                'docente_id' => '2',
                'postgrado_id' => '1',
                'postgraduante_id' => '6',
            ],
            [
                'nota_numerica' => '98',
                'nota_literal' => 'NOVENTA Y OCHO',
                'observacion' => 'Nada..',
                'fecha_registro' => '2021-03-28 23:08:13',
                'materia_id' => '1',
                'docente_id' => '2',
                'postgrado_id' => '1',
                'postgraduante_id' => '7',
            ],
            [
                'nota_numerica' => '98',
                'nota_literal' => 'NOVENTA Y OCHO',
                'observacion' => 'Nada..',
                'fecha_registro' => '2021-03-28 23:08:13',
                'materia_id' => '1',
                'docente_id' => '2',
                'postgrado_id' => '1',
                'postgraduante_id' => '8',
            ],
            [
                'nota_numerica' => '98',
                'nota_literal' => 'NOVENTA Y OCHO',
                'observacion' => 'Nada..',
                'fecha_registro' => '2021-03-28 23:08:13',
                'materia_id' => '1',
                'docente_id' => '2',
                'postgrado_id' => '1',
                'postgraduante_id' => '9',
            ],
            [
                'nota_numerica' => '98',
                'nota_literal' => 'NOVENTA Y OCHO',
                'observacion' => 'Nada..',
                'fecha_registro' => '2021-03-28 23:08:13',
                'materia_id' => '1',
                'docente_id' => '2',
                'postgrado_id' => '1',
                'postgraduante_id' => '10',
            ],
            [
                'nota_numerica' => '98',
                'nota_literal' => 'NOVENTA Y OCHO',
                'observacion' => 'Nada..',
                'fecha_registro' => '2021-03-28 23:08:13',
                'materia_id' => '1',
                'docente_id' => '2',
                'postgrado_id' => '1',
                'postgraduante_id' => '11',
            ],
            [
                'nota_numerica' => '98',
                'nota_literal' => 'NOVENTA Y OCHO',
                'observacion' => 'Nada..',
                'fecha_registro' => '2021-03-28 23:08:13',
                'materia_id' => '1',
                'docente_id' => '2',
                'postgrado_id' => '1',
                'postgraduante_id' => '12',
            ],
            [
                'nota_numerica' => '98',
                'nota_literal' => 'NOVENTA Y OCHO',
                'observacion' => 'Nada..',
                'fecha_registro' => '2021-03-28 23:08:13',
                'materia_id' => '1',
                'docente_id' => '2',
                'postgrado_id' => '1',
                'postgraduante_id' => '13',
            ],
            [
                'nota_numerica' => '98',
                'nota_literal' => 'NOVENTA Y OCHO',
                'observacion' => 'Nada..',
                'fecha_registro' => '2021-03-28 23:08:13',
                'materia_id' => '1',
                'docente_id' => '2',
                'postgrado_id' => '1',
                'postgraduante_id' => '14',
            ],
            [
                'nota_numerica' => '98',
                'nota_literal' => 'NOVENTA Y OCHO',
                'observacion' => 'Nada..',
                'fecha_registro' => '2021-03-28 23:08:13',
                'materia_id' => '1',
                'docente_id' => '2',
                'postgrado_id' => '1',
                'postgraduante_id' => '15',
            ],
             
        ];
        foreach ($materias_docente as $asignacion) {
            Calificacion::create($asignacion);
        }
    }
}
