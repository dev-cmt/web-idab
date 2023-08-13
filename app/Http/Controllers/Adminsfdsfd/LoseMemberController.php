<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\LoseMember;
use Illuminate\Support\Facades\File;
use Image;

class LoseMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data =LoseMember::all();
        return view('layouts.pages.lose_member.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.pages.lose_member.create');
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
            'image'=> 'required|image|mimes:jpg,png,jpeg,gif,svg'
        ]);
        $data= new LoseMember();

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
            $request->file('image')->move('public/images/lose_member/', $filenametostore); //--Upload Location
            // $request->file('profile_image')->storeAs('public/profile_images', $filenametostore);
     
            //Resize image here
            $thumbnailpath = public_path('images/lose_member/'.$filenametostore); //--Get File Location
            // $thumbnailpath = public_path('storage/images/profile/'.$filenametostore);
            
            $img = Image::make($thumbnailpath)->resize(1200, 850, function($constraint) {
                $constraint->aspectRatio();
            }); 
            $img->save($thumbnailpath);

            //-------Save Data
            $data->name=$request->name;
            $data->batch=$request->batch;
            $data->date=$request->date;
            $data->image=$filenametostore;
            $data->location=$request->location;
            $data->description=$request->description;
            $data->save();
        }

        $notification=array('messege'=>'Lost member add successfully!','alert-type'=>'success');
        return redirect()->route('lose_member.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Gallery $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $data=LoseMember::findOrFail($id);
        return view('layouts.pages.lose_member.edit')->with('data',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data =LoseMember::findOrFail($id);

        if($request->hasFile('image')) {
            if (File::exists("public/images/lose_member/".$data->image)) {
                File::delete("public/images/lose_member/".$data->image);
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
            $request->file('image')->move('public/images/lose_member/', $filenametostore); //--Upload Location
            // $request->file('profile_image')->storeAs('public/profile_images', $filenametostore);
        
            //Resize image here
            $thumbnailpath = public_path('images/lose_member/'.$filenametostore); //--Get File Location
            // $thumbnailpath = public_path('storage/images/profile/'.$filenametostore);
            
            $img = Image::make($thumbnailpath)->resize(1200, 850, function($constraint) {
                $constraint->aspectRatio();
            }); 
            $img->save($thumbnailpath);

            $data->name=$request->name;
            $data->batch=$request->batch;
            $data->date=$request->date;
            $data->image= $filenametostore;
            $data->location=$request->location;
            $data->description=$request->description;
            $data->save();
        }else{
            $data->name=$request->name;
            $data->batch=$request->batch;
            $data->date=$request->date;
            $data->location=$request->location;
            $data->description=$request->description;
            $data->save();
        }

        $notification=array('messege'=>'Updated lost member successfully!','alert-type'=>'success');
        return redirect()->route('lose_member.index')->with($notification);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $data=LoseMember::findOrFail($id);

         if (File::exists("public/images/lose_member/".$data->image)) {
            File::delete("public/images/lose_member/".$data->image);
        }
         $data->delete();
         return back();
    }

}
