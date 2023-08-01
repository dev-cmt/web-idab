<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Admin\Contact;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:User access'])->only(['index']);
        $this->middleware(['permission:User create'])->only(['create']);
        $this->middleware(['permission:User edit'])->only(['edit']);
        $this->middleware(['permission:User delete'])->only(['destroy']);


        $this->middleware(function ($request, $next) {
            if (Auth::check()) {
                $this->id = Auth::user()->id;

                $this->message =Contact::where('to_id','=', $this->id)->get();
                view()->share('message', $this->message);
            }
            
            return $next($request);
        });
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::latest()->get();
        $inactiveUsers = $data->where('status', false)->count();
        $admin = $data->where('is_admin', true)->count();
        $customers = $data->where('is_admin', false)->count();

        $userData = ['customers' => $customers, 'admin' => $admin, 'inactive' => $inactiveUsers];
        $users = User::with('roles')->latest()->paginate(20);

        return view('user.index', compact(['users', 'userData']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // abort_if(!auth()->user()->can('create user'), 403);

        $roles = Role::latest()->get();
        return view('user.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:80',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
            'roles' => 'required',
            // 'student_image'         =>  'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000'
            'profile_photo_path' => 'image|mimes:jpg,png,jpeg,gif,svg'
        ]);


        if ($request->hasFile("profile_photo_path")) {
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
            $img = Image::make($thumbnailpath)->resize(1200, 850, function($constraint) {
                $constraint->aspectRatio();
            }); 
            $img->save($thumbnailpath);

            //---Data Save
            $user = User::create([
                'name' => $request->name,
                'batch' => $request->batch,
                'contact_number' => $request->contact_number,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'status' => $request->status,
                'profile_photo_path' => $file_name,
    
                'email_verified_at' => '2023-01-01',
                'is_admin' => '1',
                'pune_member' => '1',
            ]);
        }

        $user->syncRoles($request->roles);

        $notification=array('messege'=>'User created successfully!','alert-type'=>'success');
        return back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::latest()->get();
        $data = $user->roles()->pluck('id')->toArray();
        return view('user.edit', compact(['user', 'roles', 'data']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|max:80',
            'email' => "required|email|unique:users,email, $user->id",
        ]);

        if ($request->hasFile("profile_photo_path")) {
            if (File::exists("public/images/profile/".$user->profile_photo_path)) {
                File::delete("public/images/profile/".$user->profile_photo_path);
            }
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
            $img = Image::make($thumbnailpath)->resize(1200, 850, function($constraint) {
                $constraint->aspectRatio();
            }); 
            $img->save($thumbnailpath);

            //---Data Save
            $user->update([
                'name' => $request->name,
                'batch' => $request->batch,
                'contact_number' => $request->contact_number,
                'email' => $request->email,
                'status' => $request->status,
                'cm_adviser' => $request->cm_adviser,
                'cm_ecommittee' => $request->cm_ecommittee,
                'cm_welfare' => $request->cm_welfare,
                'profile_photo_path' => $user->profile_photo_path,
            ]);
        }

        $user->syncRoles($request->roles);

        $notification=array('messege'=>'User data updated!','alert-type'=>'success');
        return back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        $notification=array('messege'=>'Delete user successfully!','alert-type'=>'success');
        return back()->with($notification);
    }
}
