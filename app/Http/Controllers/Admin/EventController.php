<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Models\Admin\Event;
use App\Models\Admin\EventRegister;
use App\Models\Admin\EventPayment;
use App\Models\User;
use Image;

class EventController extends Controller
{
    public function index()
    {
        $data =Event::all();
        return view('layouts.pages.event.index',compact('data'));
    }

    public function create()
    {
        return view('layouts.pages.event.create');
    }

    public function store(Request $request)
    {
        $validated=$request -> validate([
            'title'=> 'required',
            'caption'=> 'required',
            'self'=> 'required',
            'image'=> 'required|image|mimes:jpg,png,jpeg,gif,svg'
        ]);

        $data= new Event();
        if($request->hasFile('image')) {
            //get filename with extension
            $filenamewithextension = $request->file('image')->getClientOriginalName();
            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
     
            //get file extension
            $extension = $request->file('image')->getClientOriginalExtension();
            //filename to store
            $filenametostore = $filename.'_'.time().'.'.$extension;
     
            //Upload File
            $request->file('image')->move('public/images/events/', $filenametostore); //--Upload Location
            // $request->file('profile_image')->storeAs('public/profile_images', $filenametostore);
     
            //Resize image here
            $thumbnailpath = public_path('images/events/'.$filenametostore); //--Get File Location
            // $thumbnailpath = public_path('storage/images/profile/'.$filenametostore);
            
            $img = Image::make($thumbnailpath)->resize(1200, 850, function($constraint) {
                $constraint->aspectRatio();
            }); 
            $img->save($thumbnailpath);

            //Img Path Save
            $data->image=$filenametostore;
        }
        $data->title=$request->title;
        $data->caption=$request->caption;
        $data->event_date=$request->event_date;
        $data->self=$request->self;
        $data->spouse=$request->spouse;
        $data->child_above=$request->child_above;
        $data->child_bellow=$request->child_bellow;
        $data->guest=$request->guest;
        $data->driver=$request->driver;
        $data->description=$request->description;
        $data->location=$request->location;
        $data->status=$request->status;
        $data->user_id= Auth::user()->id;
        $data->image=$filenametostore;
        $data->save();

        $notification=array('messege'=>'Event add successfully!','alert-type'=>'success');
        return redirect()->route('event.index')->with($notification);
    }
    
    public function show(Event $post)
    {
        //
    }

    public function edit($id)
    {
        $data=Event::findOrFail($id);
        return view('layouts.pages.event.edit')->with('data',$data);
    }

    public function update(Request $request, $id)
    {
        $data=Event::findOrFail($id);

        if($request->hasFile('image')) {
            if (File::exists("public/images/events/".$data->image)) {
                File::delete("public/images/events/".$data->image);
            }
            //get filename with extension
            $filenamewithextension = $request->file('image')->getClientOriginalName();
            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
     
            //get file extension
            $extension = $request->file('image')->getClientOriginalExtension();
            //filename to store
            $filenametostore = $filename.'_'.time().'.'.$extension;
     
            //Upload File
            $request->file('image')->move('public/images/events/', $filenametostore); //--Upload Location
            // $request->file('profile_image')->storeAs('public/profile_images', $filenametostore);
     
            //Resize image here
            $thumbnailpath = public_path('images/events/'.$filenametostore); //--Get File Location
            // $thumbnailpath = public_path('storage/images/profile/'.$filenametostore);
            
            $img = Image::make($thumbnailpath)->resize(1200, 850, function($constraint) {
                $constraint->aspectRatio();
            }); 
            $img->save($thumbnailpath);
            $data->image=$filenametostore;
        }
        //-------Save Data
        $data->title=$request->title;
        $data->caption=$request->caption;
        $data->event_date=$request->event_date;
        $data->self=$request->self;
        $data->spouse=$request->spouse;
        $data->child_above=$request->child_above;
        $data->child_bellow=$request->child_bellow;
        $data->guest=$request->guest;
        $data->driver=$request->driver;
        $data->description=$request->description;
        $data->location=$request->location;
        $data->status=$request->status;
        $data->save();

        $notification=array('messege'=>'Event add successfully!','alert-type'=>'success');
        return redirect()->route('event.index')->with($notification);
    }

    public function destroy($id)
    {
         $data=Event::findOrFail($id);

         if (File::exists("public/images/events/".$data->image)) {
             File::delete("public/images/events/".$data->image);
         }
         $data->delete();
         return back();
    }
}
