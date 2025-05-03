<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Partner;
use App\Models\PartnerCategory;

class PartnersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Define categories with Arabic and English names
        $categoriesData = [
            ['en_name' => 'Governmental', 'ar_name' => 'حكومي'],
            ['en_name' => 'NGO', 'ar_name' => 'منظمة غير حكومية'],
            ['en_name' => 'International', 'ar_name' => 'دولي'],
        ];

        // Insert categories if they don't exist
        $categories = [];
        foreach ($categoriesData as $categoryData) {
            $categories[$categoryData['en_name']] = PartnerCategory::firstOrCreate($categoryData);
        }

        // Define partners and link them to categories
        $partners = [
            ['image_path' => 'partners/1ENJUHAtZLSJsbIZogsEVqwkwm2Qny5qgTB9x4u1.jpg', 'category' => 'Governmental'],
            ['image_path' => 'partners/1nHKfliUpYMookSvjFRCT7WmrxkoF1pY6Oz0y518.jpg', 'category' => 'Governmental'],
            ['image_path' => 'partners/2HLdwgj41gUb4UPONL1W1AsX4PaS86f7l9aJxaMk.jpg', 'category' => 'Governmental'],
            ['image_path' => 'partners/3u5oWiAdD5dxvUsSAQRRcBTm7wi1jSKmeVzzfMuq.jpg', 'category' => 'Governmental'],
            ['image_path' => 'partners/5VAFiYrIWF4vpyUF1bM90SGC2YbHGoG1Q54nBcaQ.png', 'category' => 'NGO'],
            ['image_path' => 'partners/7Yi8bQ9ShzlcrX5saYJO0wGDchy4af0DxgUuoVXA.png', 'category' => 'NGO'],
            ['image_path' => 'partners/8JVBG4NFzZxHn1eonRHfQSp6ZrPP9jWAVnHt09Gs.jpg', 'category' => 'NGO'],
            ['image_path' => 'partners/cNHCHgYfnZBodppu8HPIoTTAWPb6i14zzUjrPRxb.png', 'category' => 'NGO'],
            ['image_path' => 'partners/F4SWsy5Gtw4P8QreAWyYmF8dFrUXSLC2eRM30jN5.png', 'category' => 'International'],
            ['image_path' => 'partners/fcyUgNYTDlxxEVbeVz1zvnXuuHjA3awEgEeo0Xi9.png', 'category' => 'International'],
            ['image_path' => 'partners/FlrhG3mGKAv5S8p1BrguXccaflrzBa34hxd0NCIc.jpg', 'category' => 'International'],
            ['image_path' => 'partners/g7Jk6P8aPJbMoZuPwknqIObAsCRER0y80V758rKm.png', 'category' => 'International'],
        ];

        // Create partners with correct category_id
        foreach ($partners as $partnerData) {
            Partner::create([
                'image_path' => $partnerData['image_path'],
                'category_id' => $categories[$partnerData['category']]->id,
            ]);
        }
    }
}
