<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Favourite;

class FavouriteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Favourite::create(['student_id' => 1, 'offer_id' => 1]);
        Favourite::create(['student_id' => 1, 'offer_id' => 2]);
        Favourite::create(['student_id' => 1, 'offer_id' => 3]);
        Favourite::create(['student_id' => 2, 'offer_id' => 2]);
        Favourite::create(['student_id' => 2, 'offer_id' => 1]);
    }
}
