<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin\SubscriptionSetup;
use App\Models\Member\MemberType;

class ImportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SubscriptionSetup::create([
            'monthly_fee'=>'500',
            'sub_start_date'=>'2023-01-01',
        ]);
        
        /**___________________________________________________
         * Member Type
         * ___________________________________________________
         */
        MemberType::create([
            'name'=>'Student member',
            'description'=>'DR - 1',
            'status'=>'1',
            'user_id'=>'1',
        ]);
        MemberType::create([
            'name'=>'Candidate member',
            'description'=>'DR - 2',
            'status'=>'1',
            'user_id'=>'1',
        ]);
        MemberType::create([
            'name'=>'Professional member',
            'description'=>'DR - 3',
            'status'=>'1',
            'user_id'=>'1',
        ]);
        MemberType::create([
            'name'=>'Associate member',
            'description'=>'DR - 4',
            'status'=>'1',
            'user_id'=>'1',
        ]);
        MemberType::create([
            'name'=>'Trade member',
            'description'=>'DR - 5',
            'status'=>'1',
            'user_id'=>'1',
        ]);
        MemberType::create([
            'name'=>'Corporate member',
            'description'=>'DR - 6',
            'status'=>'1',
            'user_id'=>'1',
        ]); 
        
    }
}
