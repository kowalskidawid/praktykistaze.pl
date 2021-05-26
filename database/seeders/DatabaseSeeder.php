<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Role;
use App\Models\Category;
use App\Models\Favourite;
use App\Models\Application;
use App\Models\Location;
use App\Models\Size;
use App\Models\Type;
use App\Models\Article;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RoleSeeder::class,
            CategorySeeder::class,
            TypeSeeder::class,
            LocationSeeder::class,
            SizeSeeder::class,
            UserSeeder::class,
            FavouriteSeeder::class,
            ApplicationSeeder::class,
            ArticleSeeder::class,
        ]);
    }
}
