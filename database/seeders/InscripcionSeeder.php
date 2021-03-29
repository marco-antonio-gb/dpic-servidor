<?php
namespace Database\Seeders;

use App\Models\Inscripcion;
use Illuminate\Database\Seeder;

class InscripcionSeeder extends Seeder
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
            ['gestion' => '2021', 'fecha_registro' => '2021-03-28 23:08:13', 'postgrado_id' => 1, 'postgraduante_id' => 1],
            ['gestion' => '2021', 'fecha_registro' => '2021-03-28 23:08:13', 'postgrado_id' => 1, 'postgraduante_id' => 2],
            ['gestion' => '2021', 'fecha_registro' => '2021-03-28 23:08:13', 'postgrado_id' => 1, 'postgraduante_id' => 3],
            ['gestion' => '2021', 'fecha_registro' => '2021-03-28 23:08:13', 'postgrado_id' => 1, 'postgraduante_id' => 4],
            ['gestion' => '2021', 'fecha_registro' => '2021-03-28 23:08:13', 'postgrado_id' => 1, 'postgraduante_id' => 5],
            ['gestion' => '2021', 'fecha_registro' => '2021-03-28 23:08:13', 'postgrado_id' => 1, 'postgraduante_id' => 6],
            ['gestion' => '2021', 'fecha_registro' => '2021-03-28 23:08:13', 'postgrado_id' => 1, 'postgraduante_id' => 7],
            ['gestion' => '2021', 'fecha_registro' => '2021-03-28 23:08:13', 'postgrado_id' => 1, 'postgraduante_id' => 8],
            ['gestion' => '2021', 'fecha_registro' => '2021-03-28 23:08:13', 'postgrado_id' => 1, 'postgraduante_id' => 9],
            ['gestion' => '2021', 'fecha_registro' => '2021-03-28 23:08:13', 'postgrado_id' => 1, 'postgraduante_id' => 10],
            ['gestion' => '2021', 'fecha_registro' => '2021-03-28 23:08:13', 'postgrado_id' => 1, 'postgraduante_id' => 11],
            ['gestion' => '2021', 'fecha_registro' => '2021-03-28 23:08:13', 'postgrado_id' => 1, 'postgraduante_id' => 12],
            ['gestion' => '2021', 'fecha_registro' => '2021-03-28 23:08:13', 'postgrado_id' => 1, 'postgraduante_id' => 13],
            ['gestion' => '2021', 'fecha_registro' => '2021-03-28 23:08:13', 'postgrado_id' => 1, 'postgraduante_id' => 14],
            ['gestion' => '2021', 'fecha_registro' => '2021-03-28 23:08:13', 'postgrado_id' => 1, 'postgraduante_id' => 15]
        ];
        foreach ($materias_docente as $asignacion) {
            Inscripcion::create($asignacion);
        }
    }
}
