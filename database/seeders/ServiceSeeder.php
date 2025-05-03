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
                'en_title' => 'Market Analysis',
                'ar_title' => 'تحليل السوق',
                'en_description' => 'Comprehensive studies to support business decisions.',
                'ar_description' => 'دراسات شاملة لدعم قرارات الأعمال.',
            ],
            [
                'en_title' => 'Impact Assessment',
                'ar_title' => 'تقييم الأثر',
                'en_description' => 'Analyzing the outcomes and effectiveness of projects.',
                'ar_description' => 'تحليل نتائج وفعالية المشاريع.',
            ],
            [
                'en_title' => 'Skill Development',
                'ar_title' => 'تطوير المهارات',
                'en_description' => 'Enhancing workforce skills through tailored programs.',
                'ar_description' => 'تعزيز مهارات القوى العاملة من خلال برامج مخصصة.',
            ],
            [
                'en_title' => 'Leadership Training',
                'ar_title' => 'تدريب القيادة',
                'en_description' => 'Building leadership capacity within organizations.',
                'ar_description' => 'بناء قدرات القيادة داخل المؤسسات.',
            ],
            [
                'en_title' => 'Custom Software',
                'ar_title' => 'البرمجيات المخصصة',
                'en_description' => 'Developing tailored solutions to meet unique needs.',
                'ar_description' => 'تطوير حلول مخصصة لتلبية الاحتياجات الفريدة.',
            ],
            [
                'en_title' => 'Automation',
                'ar_title' => 'الأتمتة',
                'en_description' => 'Streamlining operations with advanced technology.',
                'ar_description' => 'تبسيط العمليات باستخدام التكنولوجيا المتقدمة.',
            ],
            [
                'en_title' => 'Governance Frameworks',
                'ar_title' => 'أطر الحوكمة',
                'en_description' => 'Establishing effective governance for organizations.',
                'ar_description' => 'إقامة الحوكمة الفعالة للمؤسسات.',
            ],
            [
                'en_title' => 'Change Management',
                'ar_title' => 'إدارة التغيير',
                'en_description' => 'Driving successful change initiatives.',
                'ar_description' => 'قيادة المبادرات الناجحة للتغيير.',
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}
