<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Parliament;

class ParliamentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // \Schema::disableForeignKeyConstraints();
        // Parliament::truncate();
        // \Schema::enableForeignKeyConstraints();
        $csvData = fopen(base_path('database/csv/parliaments.csv'), 'r');
        $transRow = true;
        while (($data = fgetcsv($csvData, 555, ',')) !== false) {
            if (!$transRow) {
                Parliament::create([
                    'id' => $data['0'],
                    'pc_no' =>$data['1'],
                    'pc_name' =>$data['2'],
                    'pc_type' =>$data['3'],
                    'state_id' =>$data['4'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
            $transRow = false;
        }
        fclose($csvData);
    }
}
