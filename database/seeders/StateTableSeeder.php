<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\State;

class StateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    { 
        // \Schema::disableForeignKeyConstraints();
        //  State::truncate();
        // \Schema::enableForeignKeyConstraints();
        $csvData = fopen(base_path('database/csv/states.csv'), 'r');
        $transRow = true;
        while (($data = fgetcsv($csvData, 555, ',')) !== false) {
            if (!$transRow) {
              State::create([
                    'name' => $data['1'],
                    'st_code' =>$data['2'],
                    'status'=>1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
            $transRow = false;
        }
        fclose($csvData);
    }

}

