<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Setting::create([
            'logo' => 'img/white%20logo.png',
            'cover_image' => null,
            'facebook' => null,
            'linkedin' => null,
            'youtube' => null,
            'whatsapp' => null,
            'email' => null,
        ]);
    }
}
