<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Booth;

class BoothTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \Schema::disableForeignKeyConstraints();
        Booth::truncate();
        \Schema::enableForeignKeyConstraints();
        $csvData = fopen(base_path('database/csv/booth_masters.csv'), 'r');
        $transRow = true;
        while (($data = fgetcsv($csvData, 555, ',')) !== false) {
            if (!$transRow) {
                Booth::create([
                    'id' => $data['0'],
                    'booth_no' => $data['1'],
                    'tot_voters' => $data['2'],
                    'district_id' => $data['3'],
                    'state_id' => $data['4'],
                    'user_id' => $data['5'],
                    'assemble_id' => $data['6'],
                    'booth_name' =>$data['7'],
                    'booth_name_uni' => $data['8'],
                    'has_auxy_ps'=> 0,
                    'booth_no_auxy'=>$data['10'],
                    'latitude'=>$data['11'],
                    'longitude'=>$data['12'],
                    'status' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                    'assigned_to' =>$data['17'],
                    'assigned_by' =>$data['18'],
                    'assigned_status' =>$data['19']
                ]);
            }
            $transRow = false;
        }
        fclose($csvData);
    }
}
