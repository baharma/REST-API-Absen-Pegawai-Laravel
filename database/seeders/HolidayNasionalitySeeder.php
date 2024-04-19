<?php

namespace Database\Seeders;

use App\Models\NasionalDay;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HolidayNasionalitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dataJson = public_path('json-data/holiday/2024.json');
        $dataGet = file_get_contents($dataJson);
        $data = json_decode($dataGet, true);

        foreach ($data as $holy) {
            NasionalDay::create([
                'holiday_date' => $holy['holiday_date'],
                'holiday_name' => $holy['holiday_name'],
                'is_national_holiday' => $holy['is_national_holiday']
            ]);
        }

    }
}
