<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Actions\Role\CreateRole;
use App\Actions\Role\UpdateRole;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Requests\RoleFormRequest;
use Spatie\Permission\Models\Permission;
use App\Models\Admin\Contact;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Master\MemberType;
use App\Models\Master\CommitteeType;

class RoleController extends Controller
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
        $roles = Role::with('permissions')->latest()->get();
        return view('role.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::orderBy('name')->get();
        // $permission_groups = User::getPermissionGroup();

        return view('role.create', compact('permissions'));
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
            'name' => 'required|unique:roles,name'
        ]);

        $role = Role::create(['name' => $request->name, 'guard_name' => 'web']);
        $role->syncPermissions($request->permissions);

        $notification=array('messege'=>'Role created successfully!','alert-type'=>'success');
        return redirect()->route('roles.index')->with($notification);
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
        $permissions = Permission::all();
        $role = Role::with('permissions')->find($id);
        $data = $role->permissions()->pluck('id')->toArray();

        return view('role.edit', compact(['permissions', 'role', 'data']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        // abort_if(!userCan('role.update'), 403);
        $request->validate([
            'name' => "required|unique:roles,name, $role->id"
        ]);

        $role->update([ 'name' => $request->name]);
        $role->syncPermissions($request->permissions);

        $notification=array('messege'=>'Role update successfully!','alert-type'=>'success');
        return back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        // abort_if(!userCan('role.delete'), 403);

        $role->delete();
        $notification=array('messege'=>'Role delete successfully!','alert-type'=>'success');
        return back()->with($notification);
    }
}
