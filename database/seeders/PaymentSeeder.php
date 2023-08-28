<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Master\MastQualification;
use App\Models\Payment\PaymentMethods;
use App\Models\Payment\PaymentReasons;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**___________________________________________________
         * Payment Reasons
         * ___________________________________________________
         */
        PaymentReasons::create([
            'name'=>'Membership',
            'user_id'=>'1',
        ]);
        PaymentReasons::create([
            'name'=>'Event',
            'user_id'=>'1',
        ]);
        PaymentReasons::create([
            'name'=>'Annual',
            'user_id'=>'1',
        ]);
        /**___________________________________________________
         * Payment Methods
         * ___________________________________________________
         */
        PaymentMethods::create([
            'name'=>'bKash',
            'image_path'=>'bKash.png',
            'status'=>'1',
        ]);
        // PaymentMethods::create([
        //     'name'=>'Rocket',
        //     'image_path'=>'Rocket.png',
        //     'status'=>'1',
        // ]);
        // PaymentMethods::create([
        //     'name'=>'Nagad',
        //     'image_path'=>'Nagad.png',
        //     'status'=>'1',
        // ]);
        // PaymentMethods::create([
        //     'name'=>'Upay',
        //     'image_path'=>'Upay.png',
        //     'status'=>'1',
        // ]);
        PaymentMethods::create([
            'name'=>'City-Bank',
            'image_path'=>'city-bank.png',
            'status'=>'1',
        ]);
        // PaymentMethods::create([
        //     'name'=>'Card',
        //     'image_path'=>'Card.png',
        //     'status'=>'1',
        // ]);
        
    }
}
