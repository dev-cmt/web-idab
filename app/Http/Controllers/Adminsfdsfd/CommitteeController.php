<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admin\Committee;

class CommitteeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('layouts.pages.committee.index', compact(['users']));
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
        return view('layouts.pages.committee.create', compact('roles'));
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

        $file_name = time() . '.' . request()->student_image->getClientOriginalExtension();
        request()->student_image->move(public_path('profile'), $file_name);

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
        ]);

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
    public function edit(User $user, $id)
    {
        // $roles = Role::latest()->get();
        // $data = $user->roles()->pluck('id')->toArray();
        // $user->find($id);
        $user =User::find($id);
        $committees =Committee::all();
        return view('layouts.pages.committee.edit',compact('user','committees'));
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
        // $user = User::findOrFail($id);
        $user->update($request->only(['name', 'email']));
        $user->committees()->sync($request->input('committees', []));

        return redirect()->route('committee.edit')->with('success', 'User updated successfully');
    }
    // public function update(Request $request, Committee $committees, $id)
    // {

    //     $user = User::findOrFail($id);
    //     $data = $user->committees()->pluck('id')->toArray();
    //     // $committees = $user->committees;


    //     // $committees->update([
    //     //     'cm_advisor' => $request->cm_advisor,
    //     //     'cm_ecommittee' => $request->cm_ecommittee,
    //     //     'cm_welfare' => $request->cm_welfare,
    //     // ]);

    //     $notification=array('messege'=>'User data updated!','alert-type'=>'success');
    //     return back()->with($notification);
    // }

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
