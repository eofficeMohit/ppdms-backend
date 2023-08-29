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
        $data= array(
            [
                'pc_no' =>1,
                'pc_name' =>'Gurdaspur',
                'pc_type' =>'1',
                'state_id' =>21,
            ],[
                'pc_no' =>2,
                'pc_name' =>'Amritsar',
                'pc_type' =>'1',
                'state_id' =>21,
            ],[
                'pc_no' =>3,
                'pc_name' =>'Khadoor Sahib',
                'pc_type' =>'1',
                'state_id' =>21,
            ],[
                'pc_no' =>4,
                'pc_name' =>'Jalandhar',
                'pc_type' =>'2',
                'state_id' =>21,
            ],[
                'pc_no' =>5,
                'pc_name' =>'Hoshiarpur',
                'pc_type' =>'2',
                'state_id' =>21,
            ],[
                'pc_no' =>6,
                'pc_name' =>'Anandpur Sahib',
                'pc_type' =>'1',
                'state_id' =>21,
            ],[
                'pc_no' =>7,
                'pc_name' =>'Ludhiana',
                'pc_type' =>'1',
                'state_id' =>21,
            ],[
                'pc_no' =>8,
                'pc_name' =>'Fatehgarh Sahib',
                'pc_type' =>'2',
                'state_id' =>21,
            ],[
                'pc_no' =>9,
                'pc_name' =>'Faridkot',
                'pc_type' =>'2',
                'state_id' =>21,
            ],[
                'pc_no' =>10,
                'pc_name' =>'Firozpur',
                'pc_type' =>'1',
                'state_id' =>21,
            ],[
                'pc_no' =>11,
                'pc_name' =>'Bathinda',
                'pc_type' =>'1',
                'state_id' =>21,
            ],[
                'pc_no' =>12,
                'pc_name' =>'Sangrur',
                'pc_type' =>'1',
                'state_id' =>21,
            ],[
                'pc_no' =>13,
                'pc_name' =>'Patiala',
                'pc_type' =>'1',
                'state_id' =>21 
             ]
        );
        Parliament::insert($data);
    }
}
