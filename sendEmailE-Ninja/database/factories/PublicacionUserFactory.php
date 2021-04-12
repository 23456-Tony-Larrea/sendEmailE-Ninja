<?php

namespace Database\Factories;

use App\Models\PublicacionUser;
use Illuminate\Database\Eloquent\Factories\Factory;

class PublicacionUserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PublicacionUser::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'tituloEvento' => $this->faker->text,            
            'tematicaEvento' => $this->faker->text,
            'descripcionEvento' => $this->faker->text,
            'enlaceEvento' => $this->faker->text,
            'fechaEvento' => $this->faker->date,
            'descripcion' => $this->faker->text,
        ];
    }
}
