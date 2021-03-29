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
        $this->call(ConfiguracionSeeder::class);
        $this->call(UsuarioSeeder::class);
        $this->call(NiveleSeeder::class);
        $this->call(DocenteSeeder::class);
        $this->call(PostgradoSeeder::class);
        $this->call(MateriaSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(PermissionTableSeeder::class);
        $this->call(RoleToUserSeeder::class);
        $this->call(MateriaDocenteSeeder::class);
        $this->call(MateriaPostgradoSeeder::class);
        $this->call(PostgraduanteSeeder::class);
        $this->call(InscripcionSeeder::class);
        $this->call(CalificacionSeeder::class);
        $this->call(PagoSeeder::class);
    }
}
