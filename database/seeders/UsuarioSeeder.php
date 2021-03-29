<?php
namespace Database\Seeders;
use App\Models\Usuario;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Usuario::create([
            'nombres'=>"ROLANDO",
            'paterno'=>"LUCAS",
            'materno'=>"MAMANI",
            'ci'=>"123456111",
            'ci_ext'=>"OR",
            'profesion'=>"INGENIERIA DE SISTEMAS",
            'celular'=>"1234567",
            'telefono'=>"7654321",
            'password'=>bcrypt('admin'),
            'email'=>"admin@admin.com",
        ]);
         
    }
}
