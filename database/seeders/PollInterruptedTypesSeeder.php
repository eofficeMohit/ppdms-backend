<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PollInterruptedTypes;

class PollInterruptedTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         PollInterruptedTypes::create([
            'name' => 'Law & Order',
            'created_at' => now(),
            'updated_at' => now()
        ]);

         PollInterruptedTypes::create([
            'name' => 'EVM Fault',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
