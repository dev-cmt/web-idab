<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin\Event;
use App\Models\Payment\PaymentReasons;
use App\Models\Payment\PaymentMethods;
use App\Models\Payment\Transaction;
use App\Models\Payment\PaymentDetails;
use App\Models\Payment\PaymentNumber;
use App\Models\Payment\Cards;

class TransactionController extends Controller
{
    public function indexRegistation() {
        $data = PaymentDetails::get();
        return view('layouts.pages.transaction.registation-index', compact('data'));
    }
    public function createRegistation()
    {
        return view('frontend.pages.register_payment');
    }
    public function storeRegistation(Request $request)
    {
        $validated=$request -> validate([
            'payment_number'=> 'required',
            'transaction_number'=> 'required',
            'transfer_number'=> 'required',
        ]);
        
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
        $paymentDetails->payment_reason_id = $request->payment_reason_id; // Register => 1, Event => 2
        $paymentDetails->ref_reason_id = $request->ref_reason_id; // Register => 1, Event => 2
        $paymentDetails->transfer_number = $request->transfer_number;
        $paymentDetails->message = $request->message;
        $paymentDetails->payment_method_id = $request->payment_method_id;
        $paymentDetails->user_id = Auth::user()->id;
        $paymentDetails->save();

        return redirect()->route('member-approve.padding');
    }
    
    
    
    /**_________________________________________________________________________________________
     * PAYMENT NUMBER => MASTER
     * _________________________________________________________________________________________
     */
    public function indexPaymentNumber() {
        $data = PaymentNumber::get();
        
        $payment_reasons = PaymentReasons::get();
        $payment_methods = PaymentMethods::get();
        $ref_reason = Event::where('status', 1)->get();
        return view('layouts.pages.transaction.payment-number-index', compact('data', 'payment_reasons', 'payment_methods', 'ref_reason'));
    }
    public function storePaymentNumber(Request $request) {
        //----Validation Check 
        $rules = [
            'number' => 'required',
            'payment_reason_id' => 'required',
            'payment_method_id' => 'required',
        ];
        if ($request->payment_reason_id == 2) {
            $rules['ref_reason_id'] = 'required';
        }
        $validator = Validator::make($request->all(), $rules);
        
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        //----Data Save
        if(isset($request->id)){
            $data = PaymentNumber::findOrFail($request->id);
        }else{
            $data = new PaymentNumber();
        }
        $data->number = $request->number;
        $data->payment_reason_id = $request->payment_reason_id;
        $data->payment_method_id = $request->payment_method_id;
        $data->ref_reason_id = $request->ref_reason_id;
        $data->status = $request->status;
        $data->user_id = Auth::user()->id;
        $data->save();
        
        // Return message
        return response()->json([
            'data' => $data,
            'user' => $data->user->name,
            'paymentReason' => $data->paymentReason->name,
            'paymentMethod' => $data->paymentMethod->name,
        ], 200);
    }
    public function editPaymentNumber(Request $request)
    {
        $data = PaymentNumber::where('id', $request->id)->first();
        
        $payment_reasons = PaymentReasons::get();
        $payment_methods = PaymentMethods::get();
        $ref_reasons = Event::where('status', 1)->get();
        // Return message
        return response()->json([
            'data' => $data,
            'reasons' => $payment_reasons,
            'methods' => $payment_methods,
            'ref_reason' => $ref_reasons,
        ], 200);
    }
    public function deletePaymentNumber(Request $request)
    {
        $data = MemberType::findOrFail($request->id);
        $data->is_delete = 1;
        $data->save();
        
        // Return message
        return response()->json(['data' => $data], 200);
    }
    public function getPaymentNumber(Request $request)
    {
        $data = PaymentNumber::where('payment_method_id', $request->method_id)->get();
        // Return message
        return response()->json(['data' => $data], 200);
    }
}
