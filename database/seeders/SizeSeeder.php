<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Size;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Size::create(['name' => 'micro', 'size' => 1]);
        Size::create(['name' => 'small', 'size' => 10]);
        Size::create(['name' => 'medium', 'size' => 50]);
        Size::create(['name' => 'large', 'size' => 250]);
    }
}
