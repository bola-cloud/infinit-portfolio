<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
    */
    public function run()
    {
        $services = [
            [
                'en_title' => 'Web Development',
                'ar_title' => 'تطوير المواقع الإلكترونية',
                'en_description' => 'Designing and building dynamic websites and platforms.',
                'ar_description' => 'تصميم وبناء مواقع ديناميكية ومنصات رقمية.',
            ],
            [
                'en_title' => 'Mobile App Development',
                'ar_title' => 'تطوير تطبيقات الجوال',
                'en_description' => 'Custom mobile apps for iOS and Android with smart integration.',
                'ar_description' => 'تطبيقات مخصصة لأنظمة iOS وAndroid مع تكامل ذكي.',
            ],
            [
                'en_title' => 'Smart IoT Solutions',
                'ar_title' => 'حلول إنترنت الأشياء',
                'en_description' => 'End-to-end IoT systems for homes, cities, and industries.',
                'ar_description' => 'أنظمة متكاملة للبيوت والمدن والمؤسسات الصناعية.',
            ],
            [
                'en_title' => 'Revolving Door Control',
                'ar_title' => 'تحكم الأبواب الدوارة',
                'en_description' => 'Custom control boards and software for automated doors.',
                'ar_description' => 'تصميم لوحات ذكية وبرمجيات متخصصة للتحكم في الأبواب.',
            ],
            [
                'en_title' => 'Custom Software Development',
                'ar_title' => 'تطوير البرمجيات المخصصة',
                'en_description' => 'Tailored systems to match your business needs and logic.',
                'ar_description' => 'أنظمة مرنة مصممة حسب احتياجات وأهداف العملاء.',
            ],
            [
                'en_title' => 'Automation & Monitoring',
                'ar_title' => 'الأتمتة والمراقبة',
                'en_description' => 'Smart dashboards to monitor, control, and optimize processes.',
                'ar_description' => 'لوحات تحكم ذكية لقياس الأداء والتحكم بالعمليات.',
            ],
            [
                'en_title' => 'Cloud Integration',
                'ar_title' => 'الدمج مع السحابة',
                'en_description' => 'Deploying secure and scalable systems on cloud platforms.',
                'ar_description' => 'نشر الأنظمة على منصات سحابية آمنة وقابلة للتوسّع.',
            ],
            [
                'en_title' => 'UI/UX Design',
                'ar_title' => 'تصميم واجهات الاستخدام',
                'en_description' => 'Modern user interfaces that deliver intuitive experiences.',
                'ar_description' => 'واجهات حديثة وتجربة استخدام سلسة وجذابة.',
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}
