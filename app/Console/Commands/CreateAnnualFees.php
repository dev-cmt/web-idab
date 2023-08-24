<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Payment\AnnualFees;
use App\Models\Payment\PaymentDetails;

class CreateAnnualFees extends Command
{
    protected $signature = 'annualfees:create';
    protected $description = 'Create annual fees on January 1st';

    public function handle()
    {
        $data = User::findOrFail(1);
        $data->status = 0; 
        $data->save(); 
        
        $currentDate = Carbon::now();
        $targetDate = Carbon::parse('2023-08-24 16:55:00');

        if ($currentDate->isSameDay($targetDate)) {

            $dueDate = Carbon::now()->endOfYear();
            
            

            $this->info('Annual fees created successfully on January 1st.');
        } else {
            $this->info('No action needed on this date.');
        }
    }
}
