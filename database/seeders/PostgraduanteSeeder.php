<?php

namespace Database\Seeders;


use App\Models\Postgraduante;
use Illuminate\Database\Seeder;

class PostgraduanteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(Postgraduante::class, 15)->create();
        Postgraduante::factory()->count(15)->create(); 

    }
}
