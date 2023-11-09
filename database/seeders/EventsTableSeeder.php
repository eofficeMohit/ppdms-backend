<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Event;
class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // \Schema::disableForeignKeyConstraints();
        // Event::truncate();
        // \Schema::enableForeignKeyConstraints();
        $csvData = fopen(base_path('database/csv/events.csv'), 'r');
        $transRow = true;
        while (($data = fgetcsv($csvData, 555, ',')) !== false) {
            if (!$transRow) {
                Event::create([
                    'event_name' => $data['1'],
                    'event_sequence' => $data['2'],
                    'start_date_time' => $data['3'],
                    'end_date_time' => $data['4'],
                    'status' => $data['5'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
            $transRow = false;
        }
        fclose($csvData);
    }
}
