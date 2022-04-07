<?php

namespace Database\Factories;

use App\Models\Revertsnut;
use Illuminate\Database\Eloquent\Factories\Factory;

class RevertsnutFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Revertsnut::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'text' => $this->faker->word,
        'text' => $this->faker->word,
        'text' => $this->faker->word,
        'text' => $this->faker->word,
        'text' => $this->faker->word,
        'text' => $this->faker->word,
        'text' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
