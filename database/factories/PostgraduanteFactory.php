<?php

namespace Database\Factories;

// use App\Models\Postgraduante;
use App\Models\Postgraduante;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostgraduanteFactory extends Factory
{

    protected $model =  Postgraduante::class;

    public function definition()
    {
        return [
            'paterno' => $this->faker->name,
            'materno' => $this->faker->lastName,
            'nombres' => $this->faker->lastName,
            'ci' => $this->faker->randomNumber(7),
            'ci_ext' => $this->faker->currencyCode,
            'lugar_nac' => $this->faker->state,
            'telf_domicilio' => $this->faker->phoneNumber,
            'celular' => $this->faker->tollFreePhoneNumber,
            'correo' => $this->faker->email,
            'profesion' => $this->faker->jobTitle,
            'observaciones' => $this->faker->text(100)
        ];
    }
}
