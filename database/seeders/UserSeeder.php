<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Student;
use App\Models\Company;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Generate one basic user for every role
        User::factory()->create(['role_id' => 1, 'email' => 'admin@admin.com']);
        User::factory()->create(['role_id' => 2, 'email' => 'student@student.com'])->student()->save(Student::factory()->make());
        User::factory()->create(['role_id' => 3, 'email' => 'company@company.com'])->company()->save(Company::factory()->make());

        // Seed the table with students and companies
        User::factory(2)->create(['role_id' => 2])->each(function ($user) {
            $user->student()->save(Student::factory()->make())->save();
        });
        User::factory(2)->create(['role_id' => 3])->each(function ($user) {
            $user->company()->save(Company::factory()->make())->save();
        });
    }
}
