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
            "Administracja publiczna / Służba cywilna",
            "Architektura",
            "Badania i Rozwój",
            "Budownictwo / Geodezja",
            "Design i Kreacja",
            "Edukacja / Nauka / Szkolenia",
            "Energetyka / Elektronika ",
            "Finanse",
            "Farmaceutyka / Biotechnologia",
            "Franczyza",
            "Gastronomia / Catering",
            "HR",
            "IT",
            "Informatyka / Administracja",
            "Informatyka / Programowanie",
            "Internet / e-commerce",
            "Inżynieria i Technologia",
            "Kadra zarządzająca",
            "Kontrola jakości",
            "Konsulting i Strategia",
            "Kosmetyka / Pielęgnacja",
            "Księgowość / Audyt / Podatki",
            "Marketing i Media",
            "Medycyna / Opieka zdrowotna",
            "Motoryzacja",
            "Nieruchomości",
            "Logistyka",
            "Ochrona osób i mienia",
            "Organizacje pozarządowe / Wolontariat",
            "Obsługa Klienta",
            "Praca fizyczna",
            "Prawo i Administracja",
            "Przemysł / Produkcja",
            "Rolnictwo / Ochrona środowiska",
            "Serwis / Technika / Montaż",
            "Sport / Rekreacja",
            "Sprzedaż",
            "Telekomunikacja",
            "Tłumaczenia",
            "Transport / Spedycja",
            "Turystyka / Hotelarstwo",
            "Ubezpieczenia",
            "Zakupy",
            "Inne"
        ];
        foreach ($categories as $category) {
            Category::create(['name' => $category]);
        }
    }
}
