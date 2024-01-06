<?php

namespace Database\Seeders;

use App\Models\Facility;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FacilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $facilities = ['Bể bơi', 'Phòng gym', 'Wifi', 'Bãi gửi xe', 'Quầy bar', 'Trạm xạc', 'Giặt ủi', 'Sân golf'];

        foreach ($facilities as $facility) {
            Facility::create([
                'name' => $facility,
            ]);
        }
    }
}
