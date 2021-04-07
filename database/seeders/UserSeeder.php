<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Genereta one user for every role
        User::factory()->create(['role_id' => 1, 'email' => 'admin@admin.com']);
        User::factory()->create(['role_id' => 2, 'email' => 'student@student.com']);
        User::factory()->create(['role_id' => 3, 'email' => 'company@company.com']);
        // Seed the table with students and companies
        User::factory(10)->create(['role_id' => 2]);
        User::factory(10)->create(['role_id' => 3]);
    }
}
