<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Payment\Transaction;
use App\Models\Payment\PaymentMethods;
use App\Models\Payment\PaymentDetails;
use App\Models\Payment\Cards;

class PaymentController extends Controller
{
    public function register_create()
    {
        return view('frontend.pages.register_payment');
    }
    public function register_store(Request $request)
    {
        $transaction = new Transaction();
        $transaction->amount = $request->amount;
        $transaction->transaction_type = 1; // 'Deposit => 1', 'Withdraw => 2', 'Purchase => 3'
        $transaction->transaction_id = null; // Payment gateway's transaction ID
        $transaction->status = 0;
        $transaction->payment_method_id = $request->payment_method_id;
        $transaction->user_id = Auth::user()->id;
        $transaction->save();

        $paymentDetails = new PaymentDetails();
        $paymentDetails->payment_date = now()->format('Y-m-d');
        $paymentDetails->paid_amount = $request->amount;
        $paymentDetails->payment_number = $request->payment_number; // (bKash number, Rocket number, Card last 4 digits)
        $paymentDetails->transaction_number = $request->transaction_number; // (payment gateway's transaction number)
        $paymentDetails->transaction_id = $transaction->id;
        $paymentDetails->for_reasons = 1; // Register => 1, Event => 2
        $paymentDetails->transfer_number = $request->transfer_number;
        $paymentDetails->message = $request->message;
        $paymentDetails->payment_method_id = $request->payment_method_id;
        $paymentDetails->user_id = Auth::user()->id;
        $paymentDetails->save();

        return redirect()->back();
    }
}
