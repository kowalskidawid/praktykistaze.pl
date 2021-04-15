<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Company::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'company_name' => $this->faker->company,
            'city' => $this->faker->city,
            'location_id' =>  $this->faker->randomElement($array = array (1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16))
        ];
    }
}
