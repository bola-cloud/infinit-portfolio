<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Scope;

class ScopesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $scopes = [
            [
                'ar_title' => 'البحث',
                'en_title' => 'Research',
                'ar_description' => 'وصف البحث باللغة العربية',
                'en_description' => 'Research description in English',
                'icon' => 'fas fa-search',
                'color' => 'primary',
            ],
            [
                'ar_title' => 'التدريب',
                'en_title' => 'Training',
                'ar_description' => 'وصف التدريب باللغة العربية',
                'en_description' => 'Training description in English',
                'icon' => 'fas fa-briefcase',
                'color' => 'success',
            ],
            [
                'ar_title' => 'التكنولوجيا',
                'en_title' => 'Technology',
                'ar_description' => 'وصف التكنولوجيا باللغة العربية',
                'en_description' => 'Technology description in English',
                'icon' => 'fas fa-cogs',
                'color' => 'secondary',
            ],
            [
                'ar_title' => 'التنمية المؤسسية',
                'en_title' => 'Institutional Development',
                'ar_description' => 'وصف التنمية المؤسسية باللغة العربية',
                'en_description' => 'Institutional development description in English',
                'icon' => 'fas fa-building',
                'color' => 'dark',
            ],
        ];

        foreach ($scopes as $scope) {
            Scope::create($scope);
        }
    }
}
