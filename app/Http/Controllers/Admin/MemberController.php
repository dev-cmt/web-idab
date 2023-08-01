<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
        return view('frontend.pages.member_register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
    {
        $validated=$request -> validate([
            'name'=> 'required',
            'dob'=> 'required',
            'designation'=> 'required',
            'collage'=> 'required',
            'profile_photo_path'=> 'required|image|mimes:jpg,png,jpeg,gif,svg'
        ]);

        if($request->hasFile('profile_photo_path')) {
            //get filename with extension
            $filenamewithextension = $request->file('profile_photo_path')->getClientOriginalName();
            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
     
            //get file extension
            $extension = $request->file('profile_photo_path')->getClientOriginalExtension();
            //filename to store
            $filenametostore = $filename.'_'.time().'.'.$extension;
     
            //Upload File
            $request->file('profile_photo_path')->move('public/images/profile/', $filenametostore); //--Upload Location
            // $request->file('profile_image')->storeAs('public/profile_images', $filenametostore);
     
            //Resize image here
            $thumbnailpath = public_path('images/profile/'.$filenametostore); //--Get File Location
            // $thumbnailpath = public_path('storage/images/profile/'.$filenametostore);
            
            $data = Image::make($thumbnailpath)->resize(1200, 850, function($constraint) {
                $constraint->aspectRatio();
            }); 
            $data->save($thumbnailpath);
        }

        //-------User ORM
        $users = User::findorfail(Auth::user()->id);
        $users->update([
            'name' => $request->name,
            'batch' => $request->batch,
            'contact_number' => $request->contact_number,
            'is_admin' => 1,
            'profile_photo_path' => $filenametostore,
        ]);

        //-------Information ORM
        $information= new InfoPersonal();
        $information->dob=$request->dob;
        $information->gender=$request->gender;
        $information->address=$request->address;
        $information->city=$request->city;
        $information->marrital_status=$request->marrital_status;
        $information->spouse=$request->spouse;
        $information->birth_day=$request->birth_day;
        $information->number_child=$request->number_child;
        $information->em_name=$request->em_name;
        $information->em_phone=$request->em_phone;
        $information->em_rleation=$request->em_rleation;
        $information->user_id=Auth::user()->id;
        $information->save();

        //-------Academic ORM
        $infoAcademic= new InfoAcademic();
        $infoAcademic->collage=$request->collage;
        $infoAcademic->subject=$request->subject;
        $infoAcademic->degree=$request->degree;
        $infoAcademic->passing_year=$request->passing_year;
        $infoAcademic->user_id=Auth::user()->id;
        $infoAcademic->save();

        //-------Family ORM
        if($request->number_child){
            foreach ($request->moreFields as $value) {
                $infoFamily= new InfoFamily();
                $infoFamily->child_name=$value['child_name'];
                $infoFamily->child_dob=$value['child_dob'];
                $infoFamily->child_gender=$value['child_gender'];
                $infoFamily->user_id=Auth::user()->id;
                $infoFamily->save();
            }
        }
        //-------InfoOther ORM
        $infoOther= new InfoOther();
        $infoOther->designation=$request->designation;
        $infoOther->company_name=$request->company_name;
        $infoOther->user_id=Auth::user()->id;
        $infoOther->save();

        return redirect()->route('member.not_approved');

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
