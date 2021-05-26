<?php

namespace Database\Factories;

use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Article::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            'content' => '<p>Occaecati consectetur placeat cupiditate quasi non. Veniam quia ea eligendi explicabo. Corrupti sint qui culpa sint id. Unde velit ut atque exercitationem sed consequatur distinctio. Eum ut voluptatibus similique esse modi facilis labore ipsam. Aut sed tenetur repudiandae architecto molestias inventore et. Sunt possimus illo eos rerum. Modi dignissimos est hic mollitia voluptas distinctio tenetur. Minus laudantium iusto qui eius voluptatem dicta sint. Dolores laudantium molestiae ut quia. Possimus error quo eius consequatur quam. Sint quas magni et id est. Aut inventore alias quidem ipsum. Velit tempora deleniti mollitia placeat ea.</p><ul><li>Lorem ipsum</li><li>Lorem ipsum</li><li>Lorem ipsum</li><li>Lorem ipsum</li></ul><p>Inventore magni eum reiciendis illo. Dolores alias quis incidunt. Perspiciatis magnam ipsam aut rerum consequatur explicabo. Eum consectetur adipisci doloribus iure quia amet qui omnis. Omnis itaque assumenda error deserunt reprehenderit aspernatur. Voluptas similique dolor minus enim placeat eaque amet. Eum iure non voluptas id iure id totam. Illo ut a odit natus velit. Quis iusto mollitia similique delectus ut. Est accusamus voluptatem est rerum et nulla quod incidunt.</p>',
            'image' => '/images/article.jpg',
            'pinned' => false
        ];
    }
}
