<?php

namespace Database\Factories;

use App\Models\Specification_type;
use Illuminate\Database\Eloquent\Factories\Factory;

class Specification_typeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Specification_type::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'spec_type' => $this->faker->word,
        'description' => $this->faker->word,
        'image' => $this->faker->word,
        'specification_id' => $this->faker->word,
        'deleted_at' => $this->faker->date('Y-m-d H:i:s'),
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
