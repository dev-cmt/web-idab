<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\EventPayment;
use App\Models\User;
use DB;
use Auth;

class EventPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=EventPayment::with('user','event')->get();
        return view('layouts.pages.event_payment.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $data=EventPayment::with('user','event')->where('event_id','=', $id)->get();

        $ecommittee = User::join('info_personals', 'users.id', '=', 'info_personals.user_id')
            ->join('info_academics', 'users.id', '=', 'info_academics.user_id')
            ->where('users.cm_ecommittee', '=', '1')
            ->select('users.id','users.name')
            ->get();
        
        $event_id = $id;
        
        return view('layouts.pages.event_payment.create',compact('ecommittee','event_id','data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $event_id)
    {
        $validated=$request -> validate([
            'pay_number'=> 'required',
            'user_id'=> 'required',
        ]);

        //-------Academic ORM
        $eventPayment= new EventPayment();
        $eventPayment->payment_type=$request->payment_type;
        $eventPayment->pay_number=$request->pay_number;
        $eventPayment->status=$request->status;
        $eventPayment->event_id = $event_id;
        $eventPayment->user_id=$request->user_id;
        $eventPayment->save();

        $notification=array('messege'=>'Gallery update successfully!','alert-type'=>'success');
        return redirect()->back()->with($notification);
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
        $data=LoseMember::findOrFail($id);
        return view('layouts.pages.event_payment.edit')->with('data', $data);
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
        //-------Eloquent ORM (3)
        $category=Category::find($id);
        $category->category_name=$request->category_name;
        $category->category_slug=Str::of($request->category_name)->slug('-');
        $category->save();

        $notification=array('messege'=>'Sub category updated successfully!','alert-type'=>'success');
        return redirect()->route('category.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        EventPayment::destroy($id);

        $notification=array('messege'=>'Category Delete successfully!','alert-type'=>'success');
        return redirect()->back()->with($notification);
    }
}
