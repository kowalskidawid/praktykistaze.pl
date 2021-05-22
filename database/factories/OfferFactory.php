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
            'description' => '<p>Occaecati consectetur placeat cupiditate quasi non. Veniam quia ea eligendi explicabo. Corrupti sint qui culpa sint id. Unde velit ut atque exercitationem sed consequatur distinctio. Eum ut voluptatibus similique esse modi facilis labore ipsam. Aut sed tenetur repudiandae architecto molestias inventore et. Sunt possimus illo eos rerum. Modi dignissimos est hic mollitia voluptas distinctio tenetur. Minus laudantium iusto qui eius voluptatem dicta sint. Dolores laudantium molestiae ut quia. Possimus error quo eius consequatur quam. Sint quas magni et id est. Aut inventore alias quidem ipsum. Velit tempora deleniti mollitia placeat ea.</p><ul><li>Lorem ipsum</li><li>Lorem ipsum</li><li>Lorem ipsum</li><li>Lorem ipsum</li></ul><p>Inventore magni eum reiciendis illo. Dolores alias quis incidunt. Perspiciatis magnam ipsam aut rerum consequatur explicabo. Eum consectetur adipisci doloribus iure quia amet qui omnis. Omnis itaque assumenda error deserunt reprehenderit aspernatur. Voluptas similique dolor minus enim placeat eaque amet. Eum iure non voluptas id iure id totam. Illo ut a odit natus velit. Quis iusto mollitia similique delectus ut. Est accusamus voluptatem est rerum et nulla quod incidunt.</p>'
        ];
    }
}
