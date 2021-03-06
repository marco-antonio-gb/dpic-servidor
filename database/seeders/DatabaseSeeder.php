<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call(TipoUsuarioSeeder::class);
        $this->call(UsuarioSeeder::class);
        $this->call(NiveleSeeder::class);
        $this->call(DocenteSeeder::class);
        $this->call(PostgradoSeeder::class);
        $this->call(MateriaSeeder::class);
    }
}
