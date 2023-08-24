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

        $currentDate = Carbon::now();
        $targetDate = Carbon::parse('2023-08-24 16:50:00');

        if ($currentDate->isSameDay($targetDate)) {

            $dueDate = Carbon::now()->endOfYear();
            $dueAmount = 1000;

            $users = User::all();

            foreach ($users as $user) {
                // Create an annual fee record for each user
                $annualFee = new AnnualFees([
                    'start_date' => Carbon::now(),
                    'due_date' => $dueDate,
                    'due_amount' => $dueAmount,
                    // Other fields
                ]);

                $user->annualFees()->save($annualFee);

                // You can also create a payment detail entry here if needed
                $paymentDetail = new PaymentDetails([
                    // Set payment detail fields here
                ]);

                $annualFee->paymentDetail()->save($paymentDetail);
            }

            $this->info('Annual fees created successfully on January 1st.');
        } else {
            $this->info('No action needed on this date.');
        }
    }
}
