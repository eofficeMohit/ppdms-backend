<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Assembly;

class AssembliesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // \Schema::disableForeignKeyConstraints();
        // Assembly::truncate();
        // \Schema::enableForeignKeyConstraints();
        $csvData = fopen(base_path('database/csv/assemblies_master.csv'), 'r');
        $transRow = true;
        while (($data = fgetcsv($csvData, 555, ',')) !== false) {
            if (!$transRow) {
                Assembly::create([
                    'asmb_code' => $data['1'],
                    'ac_type' => $data['2'],
                    'pc_id' => $data['3'],
                    'district_id' => $data['4'],
                    'state_id' => $data['5'],
                    'asmb_name' => $data['6'],
                    'status' => $data['7'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
            $transRow = false;
        }
        fclose($csvData);
    }
}
