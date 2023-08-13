<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Contact;
use Auth;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $message=Contact::whereNull('to_id')->get();
        return view('layouts.pages.contact',compact('message'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
            'name'=> 'required',
            'email'=> 'required',
        ]);

        $post =new Contact([
            "name" =>$request->name,
            "email"=>$request->email,
            "image"=>Auth::user()->profile_photo_path,
            "subject"=>$request->subject,
            "check"=>Auth::user()->id,
            "description"=>$request->description,
            "user_id"=>Auth::user()->id,
        ]);
        $post->save();
        return redirect()->back();
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

    /*________________________________________________________*/
    /*________________________________________________________*/
    public function chat($id)
    {
        // $message=Contact::findOrFail($id);
        $message=Contact::where('check','=', $id)->get();
        
        $to_id=$id;

        // return view('layouts.pages.chat');
        return view('layouts.pages.chat',compact('message','to_id'));
    }
    public function admin_reply(Request $request, $to_id)
    {
        $contact= new Contact();
        $contact->name='Pune Club';
        $contact->email='puneclub@gmail.com';
        $contact->image='fix/admin.jpg';
        $contact->check=$to_id;
        $contact->description=$request->description;
        $contact->to_id=$to_id;
        $contact->user_id=Auth::user()->id;
        $contact->save();

        return redirect()->back();
    }
}
