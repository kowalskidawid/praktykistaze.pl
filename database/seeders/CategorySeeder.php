<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            "Administracja biurowa",
            "Badania i Rozwój",
            "Design i Kreacja",
            "Finanse",
            "HR",
            "Inżynieria i Technologia",
            "IT",
            "Logistyka",
            "Marketing i Media",
            "Obsługa Klienta",
            "Prawo i Administracja",
            "Sprzedaż",
            "Zarządzanie",
            "Konsulting i Strategia",
            "Inne"
        ];
        foreach ($categories as $category) {
            Category::create(['name' => $category]);
        }
    }
}
