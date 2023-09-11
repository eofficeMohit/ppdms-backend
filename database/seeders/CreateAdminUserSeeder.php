<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \Schema::disableForeignKeyConstraints();
        User::truncate();
        \Schema::enableForeignKeyConstraints();
        $user = User::factory()->create([
            'name' => 'PPDMS',
            'email' => 'admin@gmail.com',
            'mobile_number' =>'9999999999',
            'password' => ('secret')
        ]);
	
        $role = Role::firstOrCreate(['name' => 'Admin']);
        $permissions = Permission::pluck('id','id')->all();
        $role->syncPermissions($permissions);
        $user->assignRole([$role->id]);
    }
}
