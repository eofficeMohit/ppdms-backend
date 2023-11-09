<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class OfficerMasterTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = Role::firstOrCreate(['name' => 'SO']);
        $csvData = fopen(base_path('database/csv/office_master.csv'), 'r');
        $transRow = true;
        while (($data = fgetcsv($csvData, 555, ',')) !== false) {
            if (!$transRow) {
                $user = User::where('mobile_number', $data['2'])->first();
  
                if (is_null($user)) {

                    if ($data['5']=='NULL') {
                        $assemble_id= 1;
                    }else{
                        $assemble_id= $data['5'];
                    }
                    $user = User::create([
                        'name' => $data['0'],
                        'designation' => $data['1'],
                        'mobile_number' => $data['2'],
                        'office_name' => $data['3'],
                        'dept_name' => $data['4'],
                        'assemble_id' => $assemble_id,
                        'ac_code' =>$assemble_id,
                        'api_key' => $data['6'],
                        'ac_active'=> 1,
                        'status'=>1,
                        'no_of_login_attempts'=>0,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                    $permissions = Permission::pluck('id','id')->all();
                    $role->syncPermissions($permissions);
                    $user->assignRole([$role->id]);
                }
               
            }
            $transRow = false;
        }
        fclose($csvData);
    }
}
