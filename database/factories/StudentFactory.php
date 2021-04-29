<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Student::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'city' => $this->faker->city,
            'location_id' =>  $this->faker->randomElement($array = array (1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16)),
            'image' => '/images/student.jpg',
            'description' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            'skills' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            'email' => $this->faker->companyEmail,
            'phone' => $this->faker->tollFreePhoneNumber,
            'website' => $this->faker->domainName,
            'linkedin' => $this->faker->domainName,
            'github' => $this->faker->domainName,
        ];
    }
}
