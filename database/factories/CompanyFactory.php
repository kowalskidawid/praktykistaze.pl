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
            'location_id' =>  $this->faker->randomElement($array = array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16)),
            'size_id' => $this->faker->randomElement($array= array(1,2,3,4)),
            'company_name' => $this->faker->company,
            'city' => $this->faker->city,
            'image' => '',
            'description' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            'email' => $this->faker->companyEmail,
            'phone' => $this->faker->tollFreePhoneNumber,
            'website' => $this->faker->domainName
        ];
    }
}
