<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use App\Models\Member\InfoPersonal;
use App\Models\Member\InfoAcademic;
use App\Models\Member\InfoCompany;
use App\Models\Member\InfoStudent;
use App\Models\Member\InfoDocument;
use App\Models\Master\MastQualification;
use App\Models\Master\MemberType;
use App\Models\User;
use Image;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $data = User::where('member_type_id', $id)->get();
        return view('layouts.pages.member.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $memberType = MemberType::where('is_delete', 0)->where('status', 1)->get();
        $qualification = MastQualification::where('is_delete', 0)->where('status', 1)->get();
        return view('frontend.pages.register_form', compact('memberType','qualification'));
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
            'name' => 'required',
            'email' => 'required|unique:users,email|max:255',
            'password' => 'required|confirmed|min:8',
            'member_type_id' => 'required',
            'profile_photo_path' => 'required|mimes:jpg,png,jpeg,gif,svg|image',
            
            'mast_qualification_id' => 'required',
        ]);

        /*__________________/ USER CREATE \_________________*/
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

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'status' => $request->status,
                'profile_photo_path' => $filenametostore,
                'member_type_id' => $request->member_type_id,
                'status' => 1,
                'is_admin' => 1,
            ]);
        }


        /*__________________/ InfoPersonal \_________________*/
        $infoPersonal =new InfoPersonal([
            'contact_number'=> $request->contact_number,
            'nid_no'=> $request->nid_no,
            'dob'=> $request->dob,
            'father_name'=> $request->father_name,
            'mother_name'=> $request->mother_name,
            'present_address'=> $request->present_address,
            'parmanent_address'=> $request->parmanent_address,
            'gender'=> $request->gender,
            'blood_group'=> $request->blood_group,
            'marrital_status'=> $request->marrital_status,
            'spouse'=> $request->spouse,
            'spouse_dob'=> $request->spouse_dob,
            'number_child'=> $request->number_child,
            'em_name'=> $request->em_name,
            'em_phone'=> $request->em_phone,
            'em_rleation'=> $request->em_rleation,
            'status'=> 1,
            'member_id'=> $user->id,
        ]);
        $infoPersonal->save();
        
        /*______________________/ InfoAcademic \___________________*/
        $infoAcademic =new InfoAcademic([
            'institute' => $request->institute,
            'mast_qualification_id' => $request->mast_qualification_id,
            'subject' => $request->subject,
            'passing_year' => $request->passing_year,
            'other_qualification' => $request->other_qualification,
            'status' => 1,
            'member_id' => $user->id,
        ]);
        $infoAcademic->save();
        
        /*______________________/ InfoCompany \___________________*/
        $infoCompany =new InfoCompany([
            'company_name' => $request->company_name,
            'company_email' => $request->company_email,
            'company_phone' => $request->company_phone,
            'designation' => $request->designation,
            'address' => $request->address,
            'web_url' => $request->web_url,
            'is_job' => 1,
            'is_business' => 0,
            'status' => 1,
            'member_id' => $user->id,
        ]);
        $infoCompany->save();

        /*______________________/ InfoStudent \___________________*/
        $infoStudent =new InfoStudent([
            'student_institute' => $request->student_institute,
            'semester' => $request->semester,
            'head_faculty_name' => $request->head_faculty_name,
            'head_faculty_number' => $request->head_faculty_number,
            'status' => 1,
            'member_id' => $user->id,
        ]);
        $infoStudent->save();

        /*______________________/ InfoDocument \___________________*/
        $infoDocument =new InfoDocument([
            'trade_licence' => $request->trade_licence,
            'tin_certificate' => $request->tin_certificate,
            'nid_photo_copy' => $request->nid_photo_copy,
            'passport_photo' => $request->passport_photo,
            'edu_certificate' => $request->edu_certificate,
            'experience_certificate' => $request->experience_certificate,
            'stu_id_copy' => $request->stu_id_copy,
            'recoment_letter' => $request->recoment_letter,
            'status' => 1,
            'member_id' => $user->id,
        ]);
        $infoDocument->save();
        


        /*_________________/ Send email verification \_________________*/
        $user->sendEmailVerificationNotification();
        /*_________________/ Log in the created user \_________________*/
        Auth::login($user);

        return redirect()->route('register-payment.create');
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
    public function update(Request $request, $id)
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
    /*__________________________________________________________________________________ */
    /*__________________________________________________________________________________ */
    public function approveIndex(){
        $data = User::where('is_admin', 1)->where('status', 0)->get();
        $record = User::where('is_admin', 1)->where('status', 1)->get();
        return view('layouts.pages.member.approve', compact('data','record'));
    }
    public function approveUpdate($id){
        $approve = User::findorfail($id);
        $approve->status = 1;
        $approve->is_approve = Auth::user()->id;
        $approve->save();
        $approve->assignRole('Member');
        return back();
    }
    public function approveCancel($id){
        $approve = User::findorfail($id);
        $approve->status = 2;
        $approve->is_approve = Auth::user()->id;
        $approve->save();
        $approve->assignRole('Member');
        return back();
    }
    public function approvePadding()
    {
        return view('waiting');
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
