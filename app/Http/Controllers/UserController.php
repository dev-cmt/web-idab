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
        $memberType = MemberType::where('is_delete', 0)->where('status', 1)->get();
        $committeeType = CommitteeType::where('is_delete', 0)->where('status', 1)->get();
        $roles = Role::latest()->get();
        return view('user.create', compact('roles','memberType','committeeType'));
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
            'email' => 'required|unique:users,email|max:255',
            'password' => 'required|confirmed|min:8',
            'profile_photo_path' => 'required|mimes:jpg,png,jpeg,gif,svg|image',
            'member_type_id' => 'required', // Assuming these fields are in your form
            'status' => 'required', // Assuming these fields are in your form
        ]);

        /*_____________________ MEMBER ID GENERATE ___________________*/
        $currentYear = date('Y');
        $currentMonth = date('m');
        $prefix = MemberType::where('id', $request->member_type_id)->first()->prefix;
        $highestNumber = User::where('member_code', 'like', "$prefix$currentYear-$currentMonth%")->max('member_code');
        $lastNumber = intval(substr($highestNumber, -3));
        $newNumber = $lastNumber + 1;
        $formattedNewNumber = sprintf('%03d', $newNumber);

        if ($prefix == '-') {
            $memberCode = "NEW";
        }else {
            $memberCode = "$prefix$currentYear-$currentMonth-$formattedNewNumber";
        }
        
        
        /*_____________________ MEMBER CREATE ___________________*/
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->member_type_id = $request->member_type_id;
        $user->committee_type_id = $request->committee_type_id;
        $user->member_code = $memberCode;
        $user->status = $request->status;
        $user->email_verified_at = now()->format('Y-m-d');
        $user->is_admin = 1; // Assuming this should be set to 1 for admins
        $user->approve_by = Auth::user()->id;
    
        if ($request->hasFile('profile_photo_path')) {
            $profilePhoto = $request->file('profile_photo_path');
            $filename = time() . '_' . $profilePhoto->getClientOriginalName();
            $thumbnailPath = public_path('images/profile/' . $filename);
            Image::make($profilePhoto)->resize(1200, 850, function ($constraint) {
                $constraint->aspectRatio();
            })->save($thumbnailPath);
            $user->profile_photo_path = $filename;
        }
    
        $user->save();
        $user->syncRoles($request->roles); // Assuming roles are sent through the form
    
        $notification = ['message' => 'User created successfully!', 'alert-type' => 'success'];
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
        if (File::exists("public/images/profile/".$user->profile_photo_path)) {
            File::delete("public/images/profile/".$user->profile_photo_path);
        }
        $user->delete();

        $notification=array('messege'=>'Delete user successfully!','alert-type'=>'success');
        return back()->with($notification);
    }
}
