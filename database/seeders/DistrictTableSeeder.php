<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\District;

class DistrictTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // \Schema::disableForeignKeyConstraints();
        // District::truncate();
        // \Schema::enableForeignKeyConstraints();
        $csvData = fopen(base_path('database/csv/district_master.csv'), 'r');
        $transRow = true;
        while (($data = fgetcsv($csvData, 555, ',')) !== false) {
            if (!$transRow) {
                District::create([
                    'id' => $data['0'],
                    'name' => $data['1'],
                    'd_code' => $data['2'],
                    'data_exist' => 0,
                    'd_name_hindi' => $data['4'],
                    'lock' => 0,
                    'state_id' => $data['6'],
                    'status' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
            $transRow = false;
        }
        fclose($csvData);
    }
}
