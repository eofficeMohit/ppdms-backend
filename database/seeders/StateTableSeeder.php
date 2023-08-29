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
       $data= array(
            array(
              'id' => 1,
              'name' => 'Andhra Pradesh',
              'st_code' =>'S1',
              'status'=>0,
              'created_at' => '2023-08-24 05:34:52',
              'updated_at' => '2023-08-24 05:34:52'
            ),
            array(
              'id' => 2,
              'name' => 'Arunachal Pradesh',
              'st_code' =>'S2',
              'status'=>0,
              'created_at' => '2023-08-24 05:34:52',
              'updated_at' => '2023-08-24 05:34:52'
            ),
            array(
              'id' => 3,
              'name' => 'Assam',
              'st_code' =>'S3',
              'status'=>0,
              'created_at' => '2023-08-24 05:34:52',
              'updated_at' => '2023-08-24 05:34:52'
            ),
            array(
              'id' => 4,
              'name' => 'Bihar',
              'st_code' =>'S4',
              'status'=>0,
              'created_at' => '2023-08-24 05:34:52',
              'updated_at' => '2023-08-24 05:34:52'
            ),
            array(
              'id' => 5,
              'name' => 'Chhattisgarh',
              'st_code' =>'S5',
              'status'=>0,
              'created_at' => '2023-08-24 05:34:52',
              'updated_at' => '2023-08-24 05:34:52'
            ),
            array(
              'id' => 6,
              'name' => 'Goa',
              'st_code' =>'S6',
              'status'=>0,
              'created_at' => '2023-08-24 05:34:52',
              'updated_at' => '2023-08-24 05:34:52'
            ),
            array(
              'id' => 7,
              'name' => 'Gujarat',
              'st_code' =>'S7',
              'status'=>0,
              'created_at' => '2023-08-24 05:34:52',
              'updated_at' => '2023-08-24 05:34:52'
            ),
            array(
              'id' => 8,
              'name' => 'Haryana',
              'st_code' =>'S8',
              'status'=>0,
              'created_at' => '2023-08-24 05:34:52',
              'updated_at' => '2023-08-24 05:34:52'
            ),
            array(
              'id' => 9,
              'name' => 'Himachal Pradesh',
              'st_code' =>'S9',
              'status'=>0,
              'created_at' => '2023-08-24 05:34:52',
              'updated_at' => '2023-08-24 05:34:52'
            ),
            array(
              'id' => 10,
              'name' => 'Jammu and Kashmir',
              'st_code' =>'S10',
              'status'=>0,
              'created_at' => '2023-08-24 05:34:52',
              'updated_at' => '2023-08-24 05:34:52'
            ),
            array(
              'id' => 11,
              'name' => 'Jharkhand',
              'st_code' =>'S11',
              'status'=>0,
              'created_at' => '2023-08-24 05:34:52',
              'updated_at' => '2023-08-24 05:34:52'
            ),
            array(
              'id' => 12,
              'name' => 'Karnataka',
              'st_code' =>'S12',
              'status'=>0,
              'created_at' => '2023-08-24 05:34:52',
              'updated_at' => '2023-08-24 05:34:52'
            ),
            array(
              'id' => 13,
              'name' => 'Kerala',
              'st_code' =>'S13',
              'status'=>0,
              'created_at' => '2023-08-24 05:34:52',
              'updated_at' => '2023-08-24 05:34:52'
            ),
            array(
              'id' => 14,
              'name' => 'Madhya Pradesh',
              'st_code' =>'S14',
              'status'=>0,
              'created_at' => '2023-08-24 05:34:52',
              'updated_at' => '2023-08-24 05:34:52'
            ),
            array(
              'id' => 15,
              'name' => 'Maharashtra',
              'st_code' =>'S15',
              'status'=>0,
              'created_at' => '2023-08-24 05:34:52',
              'updated_at' => '2023-08-24 05:34:52'
            ),
            array(
              'id' => 16,
              'name' => 'Manipur',
              'st_code' =>'S16',
              'status'=>0,
              'created_at' => '2023-08-24 05:34:52',
              'updated_at' => '2023-08-24 05:34:52'
            ),
            array(
              'id' => 17,
              'name' => 'Meghalaya',
              'st_code' =>'S17',
              'status'=>0,
              'created_at' => '2023-08-24 05:34:52',
              'updated_at' => '2023-08-24 05:34:52'
            ),
            array(
              'id' => 18,
              'name' => 'Mizoram',
              'st_code' =>'S18',
              'status'=>0,
              'created_at' => '2023-08-24 05:34:52',
              'updated_at' => '2023-08-24 05:34:52'
            ),
            array(
              'id' => 19,
              'name' => 'Nagaland',
              'st_code' =>'S19',
              'status'=>0,
              'created_at' => '2023-08-24 05:34:52',
              'updated_at' => '2023-08-24 05:34:52'
            ),
            array(
              'id' => 20,
              'name' => 'Odisha',
              'st_code' =>'S20',
              'status'=>0,
              'created_at' => '2023-08-24 05:34:52',
              'updated_at' => '2023-08-24 05:34:52'
            ),
            array(
              'id' => 21,
              'name' => 'Punjab',
              'st_code' =>'S21',
              'status'=>0,
              'created_at' => '2023-08-24 05:34:52',
              'updated_at' => '2023-08-24 05:34:52'
            ),
            array(
              'id' => 22,
              'name' => 'Rajasthan',
              'st_code' =>'S22',
              'status'=>0,
              'created_at' => '2023-08-24 05:34:52',
              'updated_at' => '2023-08-24 05:34:52'
            ),
            array(
              'id' => 23,
              'name' => 'Sikkim',
              'st_code' =>'S23',
              'status'=>0,
              'created_at' => '2023-08-24 05:34:52',
              'updated_at' => '2023-08-24 05:34:52'
            ),
            array(
              'id' => 24,
              'name' => 'Tamil Nadu',
              'st_code' =>'S24',
              'status'=>0,
              'created_at' => '2023-08-24 05:34:52',
              'updated_at' => '2023-08-24 05:34:52'
            ),
            array(
              'id' => 25,
              'name' => 'Telangana',
              'st_code' =>'S25',
              'status'=>0,
              'created_at' => '2023-08-24 05:34:52',
              'updated_at' => '2023-08-24 05:34:52'
            ),
            array(
              'id' => 26,
              'name' => 'Tripura',
              'st_code' =>'S26',
              'status'=>0,
              'created_at' => '2023-08-24 05:34:52',
              'updated_at' => '2023-08-24 05:34:52'
            ),
            array(
              'id' => 27,
              'name' => 'Uttar Pradesh',
              'st_code' =>'S27',
              'status'=>0,
              'created_at' => '2023-08-24 05:34:52',
              'updated_at' => '2023-08-24 05:34:52'
            ),
            array(
              'id' => 28,
              'name' => 'Uttarakhand',
              'st_code' =>'S28',
              'status'=>0,
              'created_at' => '2023-08-24 05:34:52',
              'updated_at' => '2023-08-24 05:34:52'
            ),
            array(
              'id' => 29,
              'name' => 'West Bengal',
              'st_code' =>'S29',
              'status'=>0,
              'created_at' => '2023-08-24 05:34:52',
              'updated_at' => '2023-08-24 05:34:52'
            )
          );
        State::insert($data); // Eloquent
    }

}

