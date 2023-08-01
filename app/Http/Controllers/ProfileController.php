<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Intervention\Image\Facades\Image;
use App\Models\User;
use App\Models\Admin\InfoFamily;
use App\Models\Admin\InfoOther;

class ProfileController extends Controller
{

    /**________________________________________________________________________
     * Member Profile
     * ________________________________________________________________________
     */
    function profile_show($id){
        $user = User::findOrFail($id);
        $infoPersonal = $user->infoPersonal;
        $infoFamily = $user->infoFamily;
        $infoAcademic = $user->infoAcademic;
        $infoOther = $user->infoOther;

        return view('profile.show', compact('user','infoPersonal','infoFamily','infoAcademic','infoOther'));
    }
    public function infoOtherUpdate(Request $request, InfoOther $id)
    {
        $id->update([
            // 'designation'=> $request->designation,
            // 'company_name'=> $request->company_name,
            'about_me'=> $request->about_me,
            // 'nick_name'=> $request->nick_name,
            // 'phone_number'=> $request->phone_number,
            // 'cover_photo'=> $request->cover_photo,
            // 'favorite'=> $request->favorite,

            'facebook_url'=> $request->facebook_url,
            'youtube_url'=> $request->youtube_url,
            'instagram_url'=> $request->instagram_url,
            'twitter_url'=> $request->twitter_url,
            'linkedin_url'=> $request->linkedin_url,
        ]);

        $notification = array('info_update' => 'User update successfully!', 'alert-type' => 'update');
        return redirect()->back()->with($notification);
    }

    public function changePassword(Request $request, $id)
    {
        //----------User Update
        $user = User::findorfail($id);

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
            $user->profile_photo_path = $filenametostore;
        }

        if ($request->has('password') && $request->filled('password')) {
            $validator = Validator::make($request->all(), [
                'current_password' => 'required',
                'password' => 'required|min:8',
            ]);

            if ($validator->fails()) {
                $notification = array('messege' => 'The validator failed.', 'alert-type' => 'fail');
                return back()->with($notification)->withErrors($validator)->withInput();
            }

            if (Hash::check($request->current_password, $user->password)) {
                $user->name = $request->name;
                $user->contact_number = $request->contact_number;
                $user->password = Hash::make($request->password);
                $user->save();

                $notification = array('messege' => 'User update successfully!', 'alert-type' => 'update');
                return redirect()->back()->with($notification);
            } else {
                $notification = array('messege' => 'The current password is incorrect.', 'alert-type' => 'fail');
                $current_password = array('current_password' => 'The current password is incorrect.');
                return back()->with($notification)->withErrors($current_password)->withInput();
            }
        } else {
            $user->name = $request->name;
            $user->contact_number = $request->contact_number;
            $user->save();

            $notification = array('messege' => 'User update successfully!', 'alert-type' => 'update');
            return redirect()->back()->with($notification);
        }
    }

    /**________________________________________________________________________
     * Member Edit
     * ________________________________________________________________________
     */
    function member_edit($id){
        $user = User::findOrFail($id);
        $infoPersonal = $user->infoPersonal;
        $infoFamily = $user->infoFamily;
        $infoAcademic = $user->infoAcademic;
        $infoOther = $user->infoOther;

        return view('profile.edit', compact('user','infoPersonal','infoFamily','infoAcademic','infoOther'));
    }
    function member_update(Request $request, $id){
        //--User
        $user = User::findOrFail($id);

        //--Info Personal
        $infoPersonal = $user->infoPersonal;
        $infoPersonal->dob = $request->dob;
        $infoPersonal->gender = $request->gender;
        $infoPersonal->address = $request->address;
        $infoPersonal->city = $request->city;
        $infoPersonal->marrital_status = $request->marrital_status;
        $infoPersonal->spouse = $request->spouse;
        $infoPersonal->birth_day = $request->birth_day;
        $infoPersonal->number_child = $request->number_child;
        $infoPersonal->em_name = $request->em_name;
        $infoPersonal->em_phone = $request->em_phone;
        $infoPersonal->em_rleation = $request->em_rleation;
        $infoPersonal->user_id = Auth::user()->id;
        $infoPersonal->save();


        //--Info Family
        if($request->editFields){
            foreach ($request->editFields as $value) {
                $infoFamily = InfoFamily::findOrFail($value['id']);
                $infoFamily->child_name= $value['child_name'];
                $infoFamily->child_dob=$value['child_dob'];
                $infoFamily->child_gender=$value['child_gender'];
                $infoFamily->user_id=Auth::user()->id;
                $infoFamily->save();
            }
        }
        if($request->moreFields){
            foreach ($request->moreFields as $value) {
                // $infoFamily = $user->infoFamily;
                $infoFamily = new InfoFamily();
                $infoFamily->child_name = $value['child_name'];
                $infoFamily->child_dob = $value['child_dob'];
                $infoFamily->child_gender = $value['child_gender'];
                $infoFamily->user_id = Auth::user()->id;
                $infoFamily->save();
            }    
        }
        //--Info Academic
        $infoAcademic = $user->infoAcademic;
        $infoAcademic->collage = $request->collage;
        $infoAcademic->subject = $request->subject;
        $infoAcademic->passing_year = $request->passing_year;
        $infoAcademic->degree = $request->degree;
        $infoAcademic->user_id = Auth::user()->id;
        $infoAcademic->save();

        //--Info Other
        $infoOther = $user->infoOther;
        $infoOther->about_me = $request->about_me;
        $infoOther->nick_name = $request->nick_name;
        $infoOther->phone_number = $request->phone_number;
        $infoOther->designation = $request->designation;
        $infoOther->company_name = $request->company_name;
        $infoOther->cover_photo = $request->cover_photo;
        $infoOther->favorite = $request->favorite;
        $infoOther->facebook_url = $request->facebook_url;
        $infoOther->youtube_url = $request->youtube_url;
        $infoOther->instagram_url = $request->instagram_url;
        $infoOther->twitter_url = $request->twitter_url;
        $infoOther->linkedin_url = $request->linkedin_url;
        $infoOther->whatsapp_url = $request->whatsapp_url;
        $infoOther->telegram_url = $request->telegram_url;
        $infoOther->snapchat_url = $request->snapchat_url;
        $infoOther->tiktok_url = $request->tiktok_url;
        $infoOther->wechat_url = $request->wechat_url;
        $infoOther->discord_url = $request->discord_url;
        $infoOther->user_id  = Auth::user()->id;
        $infoOther->save();

        // return response()->json(['infoOther' => $infoOther]);
        $notification = array('messege' => 'Update successfully!', 'alert-type' => 'update');
        return redirect()->back()->with($notification);
    }


    public function info_family_destroy($id){
        $data=InfoFamily::find($id);
        $data->delete();
        return response()->json('success');
    }













    public function profile($id)
    {
        $user = User::findOrFail($id);
        $infoPersonal = $user->infoPersonal;
        $infoFamily = $user->infoFamily;
        $infoAcademic = $user->infoAcademic;
        $infoOther = $user->infoOther;

        return view('profile.show', compact('user','infoPersonal','infoFamily','infoAcademic','infoOther'));
    }
    public function update(Request $request, User $user)
    {
        $user->update([
            'name' => $request->name,
            'batch' => $request->batch,
            'contact_number' => $request->contact_number,
            'email' => $request->email,
        ]);

        // if($request->has('password')){
        //     $user->update(['password' => bcrypt('password')]);
        // }

        $notification=array('messege'=>'User data updated!','alert-type'=>'success');
        return back()->with($notification);
    }
    /*________________________________________ */
    
    
}
