<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin\SubscriptionSetup;
use App\Models\Master\MemberType;
use App\Models\Master\MastQualification;
use App\Models\Payment\PaymentMethods;

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
            'registration_fee'=> 1000.00,
            'monthly_fee'=> 0.00,
            'annual_fee'=> 0.00,
            'description'=>'DR - 1',
            'status'=>'1',
            'user_id'=>'1',
        ]);
        MemberType::create([
            'name'=>'Candidate member',
            'registration_fee'=> 2000.00,
            'monthly_fee'=> 0.00,
            'annual_fee'=> 4000.00,
            'description'=>'DR - 2',
            'status'=>'1',
            'user_id'=>'1',
        ]);
        MemberType::create([
            'name'=>'Professional member',
            'registration_fee'=> 2000.00,
            'monthly_fee'=> 0.00,
            'annual_fee'=> 4000.00,
            'description'=>'DR - 3',
            'status'=>'1',
            'user_id'=>'1',
        ]);
        MemberType::create([
            'name'=>'Associate member',
            'registration_fee'=> 2000.00,
            'monthly_fee'=> 0.00,
            'annual_fee'=> 4000.00,
            'description'=>'DR - 4',
            'status'=>'1',
            'user_id'=>'1',
        ]);
        MemberType::create([
            'name'=>'Trade member',
            'registration_fee'=> 2000.00,
            'monthly_fee'=> 0.00,
            'annual_fee'=> 10000.00,
            'description'=>'DR - 5',
            'status'=>'1',
            'user_id'=>'1',
        ]);
        MemberType::create([
            'name'=>'Corporate member',
            'registration_fee'=> 2000.00,
            'monthly_fee'=> 0.00,
            'annual_fee'=> 4000.00,
            'description'=>'DR - 6',
            'status'=> 1,
            'user_id'=> 1,
        ]); 
        /**___________________________________________________
         * Payment Methods
         * ___________________________________________________
         */
        PaymentMethods::create([
            'name'=>'bKash',
        ]);
        PaymentMethods::create([
            'name'=>'Rocket',
        ]);
        PaymentMethods::create([
            'name'=>'Nagad',
        ]);
        PaymentMethods::create([
            'name'=>'Upay',
        ]);
        PaymentMethods::create([
            'name'=>'Card',
        ]);
        /**___________________________________________________
         * Payment Methods
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
    }
}
