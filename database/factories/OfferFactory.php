<?php

namespace Database\Factories;

use App\Models\Offer;
use Illuminate\Database\Eloquent\Factories\Factory;

class OfferFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Offer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category_id' => $this->faker->randomElement($array = array (1,2,3)),
            'location_id' =>  $this->faker->randomElement($array = array (1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16)),
            'city' => $this->faker->city,
            'position' => $this->faker->jobTitle
        ];
    }
}
