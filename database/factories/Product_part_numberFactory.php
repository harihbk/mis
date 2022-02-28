<?php

namespace Database\Factories;

use App\Models\Product_part_number;
use Illuminate\Database\Eloquent\Factories\Factory;

class Product_part_numberFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product_part_number::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'part_number' => $this->faker->word,
        'dates_to_ship' => $this->faker->word,
        'nominal_thread_m' => $this->faker->word,
        'nominal_thread_inch' => $this->faker->word,
        'product_length' => $this->faker->word,
        'pinch' => $this->faker->word,
        'detailed_ship' => $this->faker->word,
        'mounting_hole_shape' => $this->faker->word,
        'basic_shape' => $this->faker->word,
        'material' => $this->faker->word,
        'surface_treatment' => $this->faker->word,
        'tip_shape' => $this->faker->word,
        'additional_shape' => $this->faker->word,
        'sales_unit' => $this->faker->word,
        'application' => $this->faker->word,
        'strength_class_steel' => $this->faker->word,
        'strength_class_stainless_steel' => $this->faker->word,
        'screw_type' => $this->faker->word,
        'manufacturer' => $this->faker->word,
        'sale_discount' => $this->faker->word,
        'cad' => $this->faker->word,
        'modified_by' => $this->faker->word,
        'product_id' => $this->faker->word,
        'deleted_at' => $this->faker->date('Y-m-d H:i:s'),
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
