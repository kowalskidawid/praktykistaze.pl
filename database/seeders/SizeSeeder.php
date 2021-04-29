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
        Size::create(['name' => 'Micro Company', 'size' => 1]);
        Size::create(['name' => 'Small Company', 'size' => 10]);
        Size::create(['name' => 'Medium Company', 'size' => 50]);
        Size::create(['name' => 'Large Company', 'size' => 250]);
    }
}
