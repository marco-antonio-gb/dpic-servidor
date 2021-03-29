<?php

namespace Database\Factories;

use App\Models\Pago;
use Illuminate\Database\Eloquent\Factories\Factory;

class PagoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pago::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'item' => 'Pago Nro',
            'costo_unitario' =>$this->faker->randomElement([2500,2800,2900]),
            'boleta' => $this->faker->randomNumber(7),
            'fecha_cobro' => date($format = 'Y-m-d', $max = 'now'),
            'observacion' => 'ninguna',
            'postgrado_id' => 1,
            'postgraduante_id' => 1,
        ];
    }
}
