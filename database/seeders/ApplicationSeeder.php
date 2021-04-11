<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Application;

class ApplicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Application::create(['student_id' => 1, 'offer_id' => 1]);
        Application::create(['student_id' => 1, 'offer_id' => 3]);
        Application::create(['student_id' => 2, 'offer_id' => 1]);
        Application::create(['student_id' => 3, 'offer_id' => 2]);
        Application::create(['student_id' => 3, 'offer_id' => 3]);
    }
}
