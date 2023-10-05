<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Master\MemberType;
use App\Models\Master\CommitteeType;
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
            'name'=>'Professional Member',
            'prefix'=>'',
            'registration_fee'=> 3000.00,
            'monthly_fee'=> 0.00,
            'annual_fee'=> 4000.00,
            'description'=>'DR - 1',
            'status'=>'1',
            'user_id'=>'1',
        ]);
        MemberType::create([
            'name'=>'Associate Member',
            'prefix'=>'A-',
            'registration_fee'=> 2000.00,
            'monthly_fee'=> 0.00,
            'annual_fee'=> 4000.00,
            'description'=>'DR - 2',
            'status'=>'1',
            'user_id'=>'1',
        ]);
        MemberType::create([
            'name'=>'Candidate Member',
            'prefix'=>'C-',
            'registration_fee'=> 2000.00,
            'monthly_fee'=> 0.00,
            'annual_fee'=> 4000.00,
            'description'=>'DR - 3',
            'status'=>'1',
            'user_id'=>'1',
        ]);
        MemberType::create([
            'name'=>'Trade Member',
            'prefix'=>'T-',
            'registration_fee'=> 2000.00,
            'monthly_fee'=> 0.00,
            'annual_fee'=> 4000.00,
            'description'=>'DR - 5',
            'status'=>'1',
            'user_id'=>'1',
        ]);
        MemberType::create([
            'name'=>'Student Member',
            'prefix'=>'S-',
            'registration_fee'=> 1000.00,
            'monthly_fee'=> 0.00,
            'annual_fee'=> 1000.00,
            'description'=>'DR - 4',
            'status'=>'1',
            'user_id'=>'1',
        ]);
        /**___________________________________________________
         * Committee Type
         * ___________________________________________________
         */
        CommitteeType::create([
            'name'=>'Ad Hoc Committee',
            'description'=>'TEST DR - 1',
            'status'=>'1',
            'user_id'=>'1',
        ]);
        CommitteeType::create([
            'name'=>'Founder Members',
            'description'=>'TEST DR - 2',
            'status'=>'1',
            'user_id'=>'1',
        ]);
        /**___________________________________________________
         * Qualification
         * ___________________________________________________
         */
        MastQualification::create([
            'name'=>'BSc in Architecture',
            'description' => 'Admin Input',
            'status' => 1,
            'user_id' => 1,
        ]);
        MastQualification::create([
            'name'=>'Masters in any Discipline',
            'description' => 'Admin Input',
            'status' => 1,
            'user_id' => 1,
        ]);
        MastQualification::create([
            'name'=>'BSc in Civil Engineering',
            'description' => 'Admin Input',
            'status' => 1,
            'user_id' => 1,
        ]);
        MastQualification::create([
            'name'=>'BSc in Interior Architecture',
            'description' => 'Admin Input',
            'status' => 1,
            'user_id' => 1,
        ]);
        MastQualification::create([
            'name'=>'Graduation in Any Discipline',
            'description' => 'Admin Input',
            'status' => 1,
            'user_id' => 1,
        ]);
        MastQualification::create([
            'name'=>'Diploma in Civil Engineering',
            'description' => 'Admin Input',
            'status' => 1,
            'user_id' => 1,
        ]);
        MastQualification::create([
            'name'=>'Diploma in Architecture',
            'description' => 'Admin Input',
            'status' => 1,
            'user_id' => 1,
        ]);
        MastQualification::create([
            'name'=>'Diploma in Interior Design',
            'description' => 'Admin Input',
            'status' => 1,
            'user_id' => 1,
        ]);
        MastQualification::create([
            'name'=>'Bachelor in fine arts',
            'description' => 'Admin Input',
            'status' => 1,
            'user_id' => 1,
        ]);
        
    }
}
