<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Article;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Article::factory(1)->create(['title' => 'Poradnik CV', 'pinned' => true]);
        Article::factory(1)->create(['title' => 'Rozmowa o pracę', 'pinned' => true]);
        Article::factory(1)->create(['title' => 'Pierwsza praca', 'pinned' => true]);
        Article::factory(7)->create();
    }
}
