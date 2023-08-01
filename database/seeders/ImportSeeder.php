<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin\SubscriptionSetup;

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
    }
}
