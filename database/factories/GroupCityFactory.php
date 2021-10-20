<?php

namespace Database\Factories;

use App\Models\Campaign;
use App\Models\GroupCity;
use Illuminate\Database\Eloquent\Factories\Factory;

class GroupCityFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = GroupCity::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'group_name' => $this->faker->company(),
           
        ];
    }
}
