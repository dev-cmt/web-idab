<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Admin\Event;
use App\Models\Admin\EventRegister;
use App\Models\Admin\EventPayment;
use App\Models\User;
use Image;
use Auth;

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
            $data->image=$filenametostore;
            $data->save();
        }
        $notification=array('messege'=>'Event add successfully!','alert-type'=>'success');
        return redirect()->route('event.index')->with($notification);
    }
    
    public function show(Gallery $post)
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
            $data->image=$filenametostore;
            $data->save();
        }else{
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
        }
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
    /*______________________________________________________________________*/
    /*____________________________REGISTER__________________________________*/
    public function register_create($id)
    {
        $data =Event::findOrFail($id);

        $bkash=EventPayment::with('user','event')->where('event_id','=', $id)->where('payment_type','=', '1')->get();
        $nagad=EventPayment::with('user','event')->where('event_id','=', $id)->where('payment_type','=', '2')->get();
        $rocket=EventPayment::with('user','event')->where('event_id','=', $id)->where('payment_type','=', '3')->get();

        return view('frontend.pages.events_register',compact('data','bkash','nagad','rocket'));
    }
    public function event_register(Request $request, $id)
    {
        $validated=$request -> validate([
            'payment_type' => ['required', 'in:0,1,2,3'],
            'payment_number'=> 'required',
            'transaction_no'=> 'required',
        ]);

        $contact= new EventRegister();
        $contact->person_no=$request->person_no;
        $contact->total_amount=$request->total_amount;
        $contact->payment_number=$request->payment_number;
        $contact->transaction_no=$request->transaction_no;
        $contact->payment_type=$request->payment_type;
        $contact->status='0';
        $contact->event_id=$id;
        $contact->user_id=Auth::user()->id;
        $contact->save();

        return redirect()->route('event_registation_list');
    }
    public function event_registation_list()
    {
        $user = User::findOrFail(Auth::user()->id);
        $data = $user->eventRegister;

        // $data = EventRegister::get();   
        return view('layouts.pages.event_registation_list',compact('data'));
    }
    public function event_approve_list()
    {
        $data = EventRegister::get(); 
        return view('layouts.pages.event.approve_list',compact('data'));
    }
    
    public function approve_event_fee($id)
    {
        $events = EventRegister::findorfail($id);
        $events->receive_by = Auth::user()->id;
        $events->status = 1;
        $events->save();

        return back();
    }
    public function cancel_event_fee($id)
    {
        $events = EventRegister::findorfail($id);
        $events->receive_by = Auth::user()->id;
        $events->status = 2;
        $events->save();

        return back();
    }
    /*______________________________________________________________________*/
    /*_____________________________ VIEW ___________________________________*/
    public function fv_event()
    {
        $events =Event::all();
        return view('frontend.pages.events',compact('events'));
    }
    public function fv_event_show($id)
    {
        $events =Event::latest()->orderByDesc('id')->take(10)->orderBy('id')->get();
        $data =Event::findOrFail($id);
        return view('frontend.pages.events_details',compact('events','data'));
    }
}
