<?php

namespace Database\Factories;

use App\Models\revert_nuts;
use Illuminate\Database\Eloquent\Factories\Factory;

class revert_nutsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = revert_nuts::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
        'minimun_order_quantity' => $this->faker->word,
        'brand' => $this->faker->word,
        'warranty' => $this->faker->word,
        'air_consumption' => $this->faker->word,
        'handle_type' => $this->faker->word,
        'air_pressure' => $this->faker->word,
        'air_inlet' => $this->faker->word,
        'rivet_diameter' => $this->faker->word,
        'part_number' => $this->faker->word,
        'stroke_length' => $this->faker->word,
        'delivert_time' => $this->faker->word,
        'packaging_details' => $this->faker->word,
        'key_details' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
