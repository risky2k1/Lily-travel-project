<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            'Dọn phòng', 'Đánh giày', 'Gửi xe miễn phí', 'Ăn sáng miễn phí'
        ];

        foreach ($services as $service) {
            Service::create([
                'name' => $service,
            ]);
        }
    }
}
