<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Subscription;
use App\Models\Admin\EventPayment;
use App\Models\Admin\SubscriptionsHistory;
use App\Models\User;
use DB;
use Auth;
use Carbon;

class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payment_details =Subscription::where('user_id', '=', Auth::user()->id)->orderBy('start_date','DESC')->get();
        $data =SubscriptionsHistory::where('user_id', '=', Auth::user()->id)->orderBy('sub_month','DESC')->get();

        $total_paid =SubscriptionsHistory::where('user_id', '=', Auth::user()->id)->sum('amount');
        $sub_start_date = DB::table('subscription_setups')->latest('sub_start_date')->first();
        $monthly_fee = DB::table('subscription_setups')->latest('monthly_fee')->first();

        $start_date = Carbon\Carbon::parse($sub_start_date->sub_start_date);
        $mytime = Carbon\Carbon::now();
        $mounth = $start_date-> diffInMonths($mytime)+1;

        $total_due = $mounth * $monthly_fee->monthly_fee - $total_paid;

        return view('layouts.pages.subscription.index',compact('data','payment_details','total_due'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $total_paid =SubscriptionsHistory::where('user_id', '=', Auth::user()->id)->sum('amount');
        $sub_start_date = DB::table('subscription_setups')->latest('sub_start_date')->first();
        $monthly_fee = DB::table('subscription_setups')->latest('monthly_fee')->first();
        $start_date = Carbon\Carbon::parse($sub_start_date->sub_start_date);
        $mytime = Carbon\Carbon::now();
        $mounth = $start_date-> diffInMonths($mytime)+1;
        $total_due = $mounth * $monthly_fee->monthly_fee - $total_paid;

        // $bkash=EventPayment::with('user','event')->where('event_id','=', $id)->where('payment_type','=', '1')->get();
        // $nagad=EventPayment::with('user','event')->where('event_id','=', $id)->where('payment_type','=', '2')->get();
        // $rocket=EventPayment::with('user','event')->where('event_id','=', $id)->where('payment_type','=', '3')->get();
        // return view('layouts.pages.subscription.create',compact('info','bkash','nagad','rocket'));

        $info=User::with('infoPersonal','infoFamily','infoAcademic')->findOrFail(Auth::user()->id);

        return view('layouts.pages.subscription.create',compact('info','total_due'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated=$request -> validate([
            'payment_number'=> 'required',
            'transaction_no'=> 'required',
            'start_date'=> 'required',
            'duo_amount'=> 'required',
        ]);

        $subscription= new Subscription();
        $subscription->payment_type=$request->payment_type;
        $subscription->payment_number=$request->payment_number;
        $subscription->transaction_no=$request->transaction_no;
        // $subscription->fees=$request->fees;
        $subscription->start_date=$request->start_date;
        $subscription->end_date=$request->end_date;
        $subscription->duo_amount=$request->duo_amount;
        $subscription->fineds=$request->fineds;
        // $subscription->receive_by=$request->receive_by;
        $subscription->description=$request->description;
        $subscription->status= '0';
        $subscription->user_id=Auth::user()->id;
        $subscription->save();

        $notification=array('messege'=>'Payment successfully!','alert-type'=>'success');
        return redirect()->route('subscription.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    /*________________________________________________________________ */
    /*________________________________________________________________ */
    public function subscription_approve($id)
    {
        $approve = Subscription::findorfail($id);
        $approve->status = 1;
        $approve->save();
        
        $sub_fee = SubscriptionsHistory::where('subscriptions_id','=',$id)->get();
        
        foreach ($sub_fee as $fee) {
            $fee->status = '1';
            $fee->update();
        }
        
        return back();
    }
    public function subscription_cancel($id)
    {
        $approve = Subscription::findorfail($id);
        $approve->status = 2;
        $approve->save();

        return back();
    }
    /*________________________________________________________________ */
    /*________________________________________________________________ */

    public function subscription_approve_list()
    {
        $data =Subscription::all();
        return view('layouts.pages.subscription.approve_list',compact('data'));
    }
}
