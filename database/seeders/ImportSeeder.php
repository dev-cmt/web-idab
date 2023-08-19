<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Master\MemberType;
use App\Models\Master\MastQualification;
use App\Models\Member\InfoAcademic;

class ImportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        /**___________________________________________________
         * Member Type
         * ___________________________________________________
         */
        MemberType::create([
            'name'=>'Student Member',
            'registration_fee'=> 1000.00,
            'monthly_fee'=> 0.00,
            'annual_fee'=> 0.00,
            'description'=>'DR - 1',
            'status'=>'1',
            'user_id'=>'1',
        ]);
        MemberType::create([
            'name'=>'Candidate Member',
            'registration_fee'=> 2000.00,
            'monthly_fee'=> 0.00,
            'annual_fee'=> 4000.00,
            'description'=>'DR - 2',
            'status'=>'1',
            'user_id'=>'1',
        ]);
        MemberType::create([
            'name'=>'Professional Member',
            'registration_fee'=> 2000.00,
            'monthly_fee'=> 0.00,
            'annual_fee'=> 4000.00,
            'description'=>'DR - 3',
            'status'=>'1',
            'user_id'=>'1',
        ]);
        MemberType::create([
            'name'=>'Associate Member',
            'registration_fee'=> 2000.00,
            'monthly_fee'=> 0.00,
            'annual_fee'=> 4000.00,
            'description'=>'DR - 4',
            'status'=>'1',
            'user_id'=>'1',
        ]);
        MemberType::create([
            'name'=>'Trade Member',
            'registration_fee'=> 2000.00,
            'monthly_fee'=> 0.00,
            'annual_fee'=> 10000.00,
            'description'=>'DR - 5',
            'status'=>'1',
            'user_id'=>'1',
        ]);
        MemberType::create([
            'name'=>'Corporate Member',
            'registration_fee'=> 2000.00,
            'monthly_fee'=> 0.00,
            'annual_fee'=> 4000.00,
            'description'=>'DR - 6',
            'status'=> 1,
            'user_id'=> 1,
        ]);
        /**___________________________________________________
         * Qualification
         * ___________________________________________________
         */
        MastQualification::create([
            'name'=>'SSC',
            'description' => 'Admin Input',
            'status' => 1,
            'user_id' => 1,
        ]);
        MastQualification::create([
            'name'=>'HSC',
            'description' => 'Admin Input',
            'status' => 1,
            'user_id' => 1,
        ]);
        MastQualification::create([
            'name'=>'12th Stander',
            'description' => 'Admin Input',
            'status' => 1,
            'user_id' => 1,
        ]);
        MastQualification::create([
            'name'=>'Graduation',
            'description' => 'Admin Input',
            'status' => 1,
            'user_id' => 1,
        ]);
        MastQualification::create([
            'name'=>'Ph.D',
            'description' => 'Admin Input',
            'status' => 1,
            'user_id' => 1,
        ]); 
        /**
         * ---------------------------
         * 
         * ---------------------------
         */
         InfoAcademic::create([
            'mast_qualification_id'=>'1',
            'status'=>'1',
            'member_id'=> 1,
        ]);
         InfoAcademic::create([
            'mast_qualification_id'=>'1',
            'status'=>'1',
            'member_id'=> 2,
        ]);
        
    }
}
