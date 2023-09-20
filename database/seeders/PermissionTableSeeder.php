<?php
namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        $permissions = [
		   'settings-list',
		   'settings-add',
		   'settings-edit',
		   'settings-delete',
		   'permission-list',
		   'permission-create',
		   'permission-edit',
		   'permission-delete',
           'state-list',
		   'state-create',
		   'state-edit',
		   'state-delete',
           'district-list',
		   'district-create',
		   'district-edit',
		   'district-delete',
           'parliament-list',
		   'parliament-create',
		   'parliament-edit',
		   'parliament-delete',
		   'assembly-list',
		   'assembly-create',
		   'assembly-edit',
		   'assembly-delete',
		   'booth-list',
		   'booth-create',
		   'booth-edit',
		   'booth-delete',
		   'event-list',
		   'event-create',
		   'event-edit',
		   'event-delete',
		   'role-list',
           'role-create',
           'role-edit',
           'role-delete',
           'user-list',
           'user-create',
           'user-edit',
           'user-delete',
        ];
        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}
