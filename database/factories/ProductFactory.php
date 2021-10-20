<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name_product' => $this->faker->word(),
            'value_product' => $this->faker->randomFloat(2,0,1000),
            'campaign_id' => $this->faker->randomDigit(),
            'discount_id' => $this->faker->randomDigitNot(0)
        ];
    }
}
