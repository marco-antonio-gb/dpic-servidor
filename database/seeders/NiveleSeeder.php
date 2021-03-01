<?php

namespace Database\Seeders;

use App\Models\Nivel;
use Illuminate\Database\Seeder;

class NiveleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $niveles =
            [['name' => 'Diplomado', 'descripcion' => 'Descripcion de diplomado'],
            ['name' => 'Maestria', 'descripcion' => 'Descripcion de Maestria'],
            ['name' => 'Especialización', 'descripcion' => 'Descripcion de Especializacion']]
        ;

        foreach ($niveles as $nivel) {
            Nivel::create(['nombre' => $nivel['name'], 'descripcion' => $nivel['descripcion']]);
        }
    }
}
