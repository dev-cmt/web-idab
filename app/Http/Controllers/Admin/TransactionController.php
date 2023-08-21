<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Models\Admin\Event;
use App\Models\Payment\PaymentReasons;
use App\Models\Payment\PaymentMethods;
use App\Models\Payment\Transaction;
use App\Models\Payment\PaymentDetails;
use App\Models\Payment\PaymentNumber;
use App\Models\Payment\Cards;
use App\Models\User;
use App\Mail\MemberApproved;
use Illuminate\Support\Facades\Mail;

class TransactionController extends Controller
{
    public function indexRegistation() {
        $data = PaymentDetails::where('status', 0)->where('payment_method_id','!=', 5)->get();
        $bank = PaymentDetails::where('status', 0)->where('payment_method_id', 5)->get();
        $record = PaymentDetails::whereIn('status', [1,2])->get();
        return view('layouts.pages.transaction.registation-index', compact('data', 'record', 'bank'));
    }
    public function createRegistation()
    {
        return view('frontend.pages.register_payment');
    }
    public function storeRegistation(Request $request)
    {
        if($request->payment_method_id == 5){
            $validated=$request -> validate([
                'payment_number'=> 'required',
            ]);
        }else{
            $validated=$request -> validate([
                'payment_number'=> 'required',
                'transaction_number'=> 'required',
                'transfer_number'=> 'required',
            ]);
        }
        $approve = User::findorfail(Auth::user()->id);
        $approve->is_admin = 1;
        $approve->save();
        
        $transaction = new Transaction();
        $transaction->amount = $request->amount;
        $transaction->transaction_type = 1; // 'Deposit => 1', 'Withdraw => 2', 'Purchase => 3'
        $transaction->transaction_id = null; // Payment gateway's transaction ID
        $transaction->status = 0;
        $transaction->payment_method_id = $request->payment_method_id;
        $transaction->user_id = Auth::user()->id;
        $transaction->save();

        function uploadFile($request, $fieldName, $subfolder, $userId) {
            if ($request->hasFile($fieldName)) {
                $uploadedFile = $request->file($fieldName);
                $extension = $uploadedFile->getClientOriginalExtension();
                $filenameToStore = strtoupper($fieldName) . '_' . time() . '.' . $extension;
        
                $folderPath = public_path("document/member/{$userId}/{$subfolder}");
                if (!File::exists($folderPath)) {
                    File::makeDirectory($folderPath, 0777, true);
                }
                $uploadedFile->move($folderPath, $filenameToStore);
                return "document/member/{$userId}/{$subfolder}/{$filenameToStore}";
            }
            return null;
        }
        $paymentDetails = new PaymentDetails();
        $paymentDetails->payment_date = now()->format('Y-m-d');
        $paymentDetails->paid_amount = $request->amount;
        $paymentDetails->payment_number = $request->payment_number; // (bKash number, Rocket number, Card last 4 digits)
        $paymentDetails->transaction_number = $request->transaction_number; // (payment gateway's transaction number)
        $paymentDetails->transaction_id = $transaction->id;
        $paymentDetails->payment_reason_id = $request->payment_reason_id; // Register => 1, Event => 2
        $paymentDetails->ref_reason_id = $request->ref_reason_id; // Register => 1, Event => 2
        $paymentDetails->transfer_number = $request->transfer_number;
        $paymentDetails->slip = uploadFile($request, 'slip', 'bank-info', Auth::user()->id);
        $paymentDetails->message = $request->message;
        $paymentDetails->payment_method_id = $request->payment_method_id;
        $paymentDetails->member_id = Auth::user()->id;
        $paymentDetails->status = 0;
        $paymentDetails->save();
        return redirect()->route('member-approve.padding');
    }
    
    
    public function approveRegistationApprove($id) {
        $data = PaymentDetails::findOrFail($id);
        $data->status = 1;
        $data->user_id = Auth::user()->id;
        $data->save();

        $mailData =[
            'title' => 'Your Payment Is Receive Successfully',
            'body' => 'This Is body',
        ];
        $user = User::find($data->member_id);
        Mail::to($user->email)->send(new MemberApproved($mailData));

        $notification=array('messege'=>'Approve successfully!','alert-type'=>'success');
        return redirect()->back()->with($notification);
    }
    public function approveRegistationCancel($id) {
        $data = PaymentDetails::findOrFail($id);
        $data->status = 2;
        $data->user_id = Auth::user()->id;
        $data->save();

        return redirect()->back();
    }
    public function detailsRegistration($id) {
        $data = PaymentDetails::where('id', $id)->first();
        
        return view('layouts.pages.transaction.registation-show', compact('data'));
    }

    public function downloadRegistration($id)
    {
        $data = PaymentDetails::findOrFail($id);
        $filePath = public_path($data->slip);

        if (file_exists($filePath) && pathinfo($filePath, PATHINFO_EXTENSION) === 'pdf') {
            return Response::download($filePath);
        } else {
            return redirect()->back()->with('error', 'PDF file not found.');
        }
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
