<?php

namespace Database\Factories;

use App\Models\Reverts;
use Illuminate\Database\Eloquent\Factories\Factory;

class RevertsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Reverts::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
        'minimum' => $this->faker->word,
        'Model' => $this->faker->word,
        'Brand' => $this->faker->word,
        'Warranty' => $this->faker->word,
        'Air' => $this->faker->word,
        'Handle' => $this->faker->word,
        'Air' => $this->faker->word,
        'Air' => $this->faker->word,
        'Rivet' => $this->faker->word,
        'Part' => $this->faker->word,
        'Stroke' => $this->faker->word,
        'Delivery' => $this->faker->word,
        'Packaging' => $this->faker->word,
        'Key' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
