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
use App\Models\Master\MemberType;
use App\Models\Master\CommitteeType;

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
                // Retrieve user's messages
                $this->message = Contact::get();
                view()->share('message', $this->message);
            }
            // Retrieve Member types
            $this->memberType = MemberType::get();
            view()->share('memberType', $this->memberType);
            // Retrieve Committee types
            $this->committeeType = CommitteeType::get(); // Fixed assignment
            view()->share('committeeType', $this->committeeType);
            
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
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'batch' => $request->batch,
                'contact_number' => $request->contact_number,
                'profile_photo_path' => $file_name,
                'email_verified_at' => '2023-01-01',
                'is_admin' => '1',
                'status' => $request->status,
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
            // 'email' => "required|email|unique:users,email, $user->id",
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
                'profile_photo_path' => $filename,
            ]);
        }
        //---Data Save
        $user->update([
            'name' => $request->name,
            'status' => $request->status,
            'member_type_id' => $request->member_type_id,
            'committee_type_id' => $request->committee_type_id,
        ]);
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
