<?php

namespace Database\Factories;

use App\Models\Offer;
use Illuminate\Database\Eloquent\Factories\Factory;
use DateTime;

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
            'category_id' => $this->faker->randomElement($array = array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15)),
            'location_id' =>  $this->faker->randomElement($array = array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16)),
            'type_id' =>  $this->faker->randomElement($array = array(1,2)),
            'offer_duration' => $this->faker->randomElement($array = array(5,10,15,20,25,30)),
            'job_start' => new DateTime('2021-06-01'),
            'job_duration' => $this->faker->randomElement($array = array(30,60,90,120)),
            'position' => $this->faker->jobTitle,
            'city' => $this->faker->city,
            'image' => '/images/offer.jpg',
            'salary' => $this->faker->randomElement($array = array(0,2000,3000)),
            'vacancies' => $this->faker->randomElement($array = array(1,2,3,4,5,6,7,8,9,10)),
            'description' => $this->faker->paragraph($nbSentences = 50, $variableNbSentences = true)
        ];
    }
}
