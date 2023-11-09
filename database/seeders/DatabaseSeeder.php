<?php

namespace Database\Seeders;

use Database\Seeders\ParliamentTableSeeder;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            PermissionTableSeeder::class,
            CreateAdminUserSeeder::class,
            StateTableSeeder::class,
            ParliamentTableSeeder::class,
            DistrictTableSeeder::class,
            EventsTableSeeder::class,
            AssembliesTableSeeder::class,
            OfficerMasterTableSeeder::class,
            BoothTableSeeder::class,
            PollInterruptedTypesSeeder::class,
        ]);
    }
}
