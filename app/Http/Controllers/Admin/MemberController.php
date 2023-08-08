<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use App\Models\Admin\InfoAcademic;
use App\Models\Admin\InfoFamily;
use App\Models\Admin\InfoPersonal;
use App\Models\Admin\InfoOther;
use App\Models\User;
use Image;
use Auth;
use DB;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data = User::with('infoPersonal', 'infoFamily', 'infoAcademic')->where('users.is_admin','=','1')->where('users.status','=','0')->get();

        $data = DB::table('users')
        ->where('users.is_admin','=','1')
        ->where('users.status','=','0')
        ->join('info_personals', 'info_personals.user_id', '=', 'users.id')
        ->join('info_academics', 'info_academics.user_id', '=', 'users.id')
        ->select('users.name','users.id','users.batch','users.contact_number','info_personals.marrital_status','info_personals.gender','info_academics.collage')
        ->get();

        return view('layouts.pages.member_list',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.pages.register_form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required', // Add name validation
            'email' => 'required|unique:users,email|max:255',
            'password' => 'required|confirmed|min:8',
            'member_type_id' => 'required',
            'profile_photo_path' => 'required|mimes:jpg,png,jpeg,gif,svg|image',
        ]);

        $filenametostore = 'null';

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'status' => $request->status,
            'profile_photo_path' => $filenametostore,
            'member_type_id' => $request->member_type_id,
    
            'status' => '0',
            'is_admin' => '0',
        ]);
    
        // Send email verification link to the user
        $user->sendEmailVerificationNotification();

        // Log in the created user
        Auth::login($user);

        return redirect()->route('member_register.payment');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function payment()
    {
        return view('frontend.pages.register_payment');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $posts=Gallery::findOrFail($id);
        return view('layouts.pages.gallery.edit')->with('posts',$posts);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
     $post=Gallery::findOrFail($id);
     if($request->hasFile("cover")){
         if (File::exists("cover/".$post->cover)) {
             File::delete("cover/".$post->cover);
         }
         $file=$request->file("cover");
         $post->cover=time()."_".$file->getClientOriginalName();
         $file->move(\public_path("/cover"),$post->cover);
         $request['cover']=$post->cover;
     }

        $post->update([
            "title" =>$request->title,
            "description"=>$request->description,
            "date"=>$request->date,
            "cover"=>$post->cover,
            "public"=>$request->public,
        ]);

        if($request->hasFile("images")){
            $files=$request->file("images");
            foreach($files as $file){
                $imageName=time().'_'.$file->getClientOriginalName();
                $request["gallery_id"]=$id;
                $request["image"]=$imageName;
                $file->move(\public_path("images"),$imageName);
                Image::create($request->all());

            }
        }
        $notification=array('messege'=>'Category save successfully!','alert-type'=>'success');
        return redirect()->route('gallery.index')->with($notification);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $posts=Gallery::findOrFail($id);

         if (File::exists("cover/".$posts->cover)) {
             File::delete("cover/".$posts->cover);
         }
         $images=Image::where("gallery_id",$posts->id)->get();
         foreach($images as $image){
         if (File::exists("images/".$image->image)) {
            File::delete("images/".$image->image);
        }
         }
         $posts->delete();
         return back();
    }
    /*__________________________________________________________________________________ */
    /*__________________________________________________________________________________ */
    public function approved($id){
        
        $approve = User::findorfail($id);
        $approve->status = 1;
        $approve->pune_member = 1;
        // $approve->profile_photo_path = 'fix/member.jpg';
        $approve->save();

        $approve->assignRole('Member');
        return back();
    }
    public function not_approved()
    {
        return view('comming_soon');
    }
    /*__________________________________________________________________________________ */
    /*__________________________________________________________________________________ */
    public function fv_member_all()
    {
        $results = DB::table('users')
            ->join('info_personals', 'users.id', '=', 'info_personals.user_id')
            ->join('info_academics', 'users.id', '=', 'info_academics.user_id')
            ->join('info_others', 'users.id', '=', 'info_others.user_id')
            ->select('users.*','info_personals.*','info_academics.*','info_others.*')
            ->where('users.pune_member', '=', '1')
            ->get();

        return view('frontend.pages.member_list',compact('results'));
    }
    public function fv_member_details($id)
    {
        $user = User::findOrFail($id);
        $infoPersonal = $user->infoPersonal;
        $infoFamily = $user->infoFamily;
        $infoAcademic = $user->infoAcademic;
        $infoOther = $user->infoOther;

        return view('frontend.pages.member_details', compact('user','infoPersonal','infoAcademic','infoOther'));
    }
    public function fv_adviser ()
    {
        $results = DB::table('users')
        ->join('info_personals', 'users.id', '=', 'info_personals.user_id')
        ->join('info_academics', 'users.id', '=', 'info_academics.user_id')
        ->join('info_others', 'users.id', '=', 'info_others.user_id')
        ->select('users.*','info_personals.*','info_academics.*','info_others.*')
        ->where('users.cm_adviser', '=', '1')
        ->get();

        return view('frontend.pages.cm_adviser',compact('results'));
    }
    public function fv_executive_committee ()
    {
        $results = DB::table('users')
        ->join('info_personals', 'users.id', '=', 'info_personals.user_id')
        ->join('info_academics', 'users.id', '=', 'info_academics.user_id')
        ->join('info_others', 'users.id', '=', 'info_others.user_id')
        ->select('users.*','info_personals.*','info_academics.*','info_others.*')
        ->where('users.cm_ecommittee', '=', '1')
        ->get();

        return view('frontend.pages.cm_ecommittee',compact('results'));
    }
    public function fv_welfare ()
    {
        $results = DB::table('users')
        ->join('info_personals', 'users.id', '=', 'info_personals.user_id')
        ->join('info_academics', 'users.id', '=', 'info_academics.user_id')
        ->join('info_others', 'users.id', '=', 'info_others.user_id')
        ->select('users.*','info_personals.*','info_academics.*','info_others.*')
        ->where('users.cm_welfare', '=', '1')
        ->get();

        return view('frontend.pages.cm_welfare',compact('results'));
    }
    /*__________________________________________________________________________________ */
    /*__________________________________________________________________________________ */
    public function bv_member_all()
    {
        $user = DB::table('users')
        ->join('info_personals', 'users.id', '=', 'info_personals.user_id')
        ->join('info_academics', 'users.id', '=', 'info_academics.user_id')
        ->join('info_others', 'users.id', '=', 'info_others.user_id')
        ->select('users.*','info_personals.*','info_academics.*','info_others.*')
        ->where('users.pune_member', '=', '1')
        ->get();

        return view('layouts.pages.view_pune_member',compact('user'));
    }
    public function bv_adviser ()
    {
        $user = DB::table('users')
        ->join('info_personals', 'users.id', '=', 'info_personals.user_id')
        ->join('info_academics', 'users.id', '=', 'info_academics.user_id')
        ->join('info_others', 'users.id', '=', 'info_others.user_id')
        ->select('users.*','info_personals.*','info_academics.*','info_others.*')
        ->where('users.cm_adviser', '=', '1')
        ->get();

        return view('layouts.pages.view_adviser',compact('user'));
    }
    public function bv_executive_committee ()
    {
        $user = DB::table('users')
        ->join('info_personals', 'users.id', '=', 'info_personals.user_id')
        ->join('info_academics', 'users.id', '=', 'info_academics.user_id')
        ->join('info_others', 'users.id', '=', 'info_others.user_id')
        ->select('users.*','info_personals.*','info_academics.*','info_others.*')
        ->where('users.cm_ecommittee', '=', '1')
        ->get();

        return view('layouts.pages.view_ecommittee',compact('user'));
    }
    public function bv_welfare ()
    {
        $user = DB::table('users')
        ->join('info_personals', 'users.id', '=', 'info_personals.user_id')
        ->join('info_academics', 'users.id', '=', 'info_academics.user_id')
        ->join('info_others', 'users.id', '=', 'info_others.user_id')
        ->select('users.*','info_personals.*','info_academics.*','info_others.*')
        ->where('users.cm_welfare', '=', '1')
        ->get();

        return view('layouts.pages.view_welfare',compact('user'));
    }
}
