<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Exceptions\PostTooLargeException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Intervention\Image\Facades\Image;
use App\Models\Member\InfoPersonal;
use App\Models\Member\InfoChildDetails;
use App\Models\Member\InfoAcademic;
use App\Models\Member\InfoCompany;
use App\Models\Member\InfoStudent;
use App\Models\Member\InfoOther;
use App\Models\Member\InfoDocument;
use App\Models\Master\MemberType;
use App\Models\Master\MastQualification;
use App\Models\User;

class ProfileController extends Controller
{

    /**________________________________________________________________________
     * Member Profile
     * ________________________________________________________________________
     */
    function profile_show($id){
        $user = User::findOrFail($id);
        $infoPersonal = $user->infoPersonal;
        $infoChildDetails = $user->infoChildDetails;
        $infoAcademic = $user->infoAcademic;
        $infoCompany = $user->infoCompany;
        $infoStudent = $user->infoStudent;
        $infoOther = $user->infoOther;
        $infoDocument = $user->infoDocument;

        return view('profile.show', compact('user','infoPersonal','infoChildDetails','infoAcademic','infoCompany','infoStudent','infoOther','infoDocument'));
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
        $infoChildDetails = $user->infoChildDetails;
        $infoAcademic = $user->infoAcademic;
        $infoCompany = $user->infoCompany;
        $infoStudent = $user->infoStudent;
        $infoOther = $user->infoOther;
        $infoDocument = $user->infoDocument;

        $qualification = MastQualification::where('is_delete', 0)->where('status', 1)->get();
        return view('profile.edit', compact('user','infoPersonal','infoChildDetails','infoAcademic','infoCompany','infoStudent','infoOther','infoDocument', 'qualification'));
    }
    function member_update(Request $request, $id){
        //--User
        $user = User::findOrFail($id);

        /*__________________/ InfoPersonal \_________________*/
        if(is_null($user->infoPersonal)){
            $infoPersonal = new InfoPersonal();
            $infoPersonal->contact_number = $request->contact_number;
            $infoPersonal->nid_no = $request->nid_no;
            $infoPersonal->dob = $request->dob;
            $infoPersonal->father_name = $request->father_name;
            $infoPersonal->mother_name = $request->mother_name;
            $infoPersonal->present_address = $request->present_address;
            $infoPersonal->parmanent_address = $request->parmanent_address;
            $infoPersonal->gender = $request->gender;
            $infoPersonal->blood_group = $request->blood_group;
            $infoPersonal->marrital_status = $request->marrital_status;
            $infoPersonal->spouse = $request->spouse;
            $infoPersonal->spouse_dob = $request->spouse_dob;
            $infoPersonal->number_child = $request->number_child;
            $infoPersonal->em_name = $request->em_name;
            $infoPersonal->em_phone = $request->em_phone;
            $infoPersonal->em_rleation = $request->em_rleation;
            $infoPersonal->status = 1;
            $infoPersonal->member_id = $user->id;
            $infoPersonal->save();
        }else{ 
            $infoPersonal = $user->infoPersonal;
            $infoPersonal->contact_number = $request->contact_number;
            $infoPersonal->nid_no = $request->nid_no;
            $infoPersonal->dob = $request->dob;
            $infoPersonal->father_name = $request->father_name;
            $infoPersonal->mother_name = $request->mother_name;
            $infoPersonal->present_address = $request->present_address;
            $infoPersonal->parmanent_address = $request->parmanent_address;
            $infoPersonal->gender = $request->gender;
            $infoPersonal->blood_group = $request->blood_group;
            $infoPersonal->marrital_status = $request->marrital_status;
            $infoPersonal->spouse = $request->spouse;
            $infoPersonal->spouse_dob = $request->spouse_dob;
            $infoPersonal->number_child = $request->number_child;
            $infoPersonal->em_name = $request->em_name;
            $infoPersonal->em_phone = $request->em_phone;
            $infoPersonal->em_rleation = $request->em_rleation;
            $infoPersonal->save();
        }
        
        /*______________________/ InfoAcademic \___________________*/
        if(is_null($user->infoAcademic || !is_null($request->institute))){
            $validated=$request -> validate([
                'mast_qualification_id'=> 'required',
            ]);
            
            $infoAcademic->institute = $request->institute;
            $infoAcademic->mast_qualification_id = $request->mast_qualification_id;
            $infoAcademic->subject = $request->subject;
            $infoAcademic->passing_year = $request->passing_year;
            $infoAcademic->other_qualification = $request->other_qualification;
            $infoAcademic = new InfoAcademic();
            $infoAcademic->status = 1;
            $infoAcademic->member_id = $user->id;
            $infoAcademic->save();
        }elseif (!is_null($user->infoAcademic)) { 
            $infoAcademic = $user->infoAcademic;
            $infoAcademic->institute = $request->institute;
            $infoAcademic->mast_qualification_id = $request->mast_qualification_id;
            $infoAcademic->subject = $request->subject;
            $infoAcademic->passing_year = $request->passing_year;
            $infoAcademic->other_qualification = $request->other_qualification;
            $infoAcademic->save();
        }
        
        /*______________________/ InfoCompany \___________________*/
        if(!is_null($request->company_name) && is_null($request->student_institute) && is_null($user->infoCompany)){
            $infoCompany = new InfoCompany();
            $infoCompany->company_name = $request->company_name;
            $infoCompany->company_email = $request->company_email;
            $infoCompany->company_phone = $request->company_phone;
            $infoCompany->designation = $request->designation;
            $infoCompany->address = $request->address;
            $infoCompany->web_url = $request->web_url;
            $infoCompany->status = 1;
            $infoCompany->member_id = $user->id;
            $infoCompany->save();
        }elseif (!is_null($user->infoCompany)) { 
            $infoCompany = $user->infoCompany;
            $infoCompany->company_name = $request->company_name;
            $infoCompany->company_email = $request->company_email;
            $infoCompany->company_phone = $request->company_phone;
            $infoCompany->designation = $request->designation;
            $infoCompany->address = $request->address;
            $infoCompany->web_url = $request->web_url;
            $infoCompany->save();
        }
        

        /*______________________/ InfoStudent \___________________*/
        if(!is_null($request->student_institute) && is_null($request->company_name) && is_null($user->infoStudent)){
            $infoStudent = new InfoStudent();
             $infoStudent->student_institute = $request->student_institute;
            $infoStudent->semester = $request->semester;
            $infoStudent->head_faculty_name = $request->head_faculty_name;
            $infoStudent->head_faculty_number = $request->head_faculty_number;
            $infoStudent->status = 1;
            $infoStudent->member_id = $user->id;
            $infoStudent->save();
        }elseif (!is_null($user->infoStudent)) { 
            $infoStudent = $user->infoStudent;
            $infoStudent->student_institute = $request->student_institute;
            $infoStudent->semester = $request->semester;
            $infoStudent->head_faculty_name = $request->head_faculty_name;
            $infoStudent->head_faculty_number = $request->head_faculty_number;
            $infoStudent->save();
        }
        

        /*______________________/ InfoOther \___________________*/
        if(is_null($user->infoOther)){
            $infoOther = new InfoOther();
            $infoOther->about_me = $request->about_me;
            $infoOther->nick_name = $request->nick_name;
            $infoOther->phone_number = $request->phone_number;
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
            $infoOther->status = 1;
            $infoOther->member_id = $user->id;
            $infoOther->save();
        }else{ 
            $infoOther = $user->infoOther;
            $infoOther->about_me = $request->about_me;
            $infoOther->nick_name = $request->nick_name;
            $infoOther->phone_number = $request->phone_number;
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
            $infoOther->save();
        }
        /*______________________/ InfoDocument \___________________*/
        $userId = $user->id;
        function uploadFile($request, $fieldName, $subfolder, $userId, $oldFilePath = null) {
            if ($request->hasFile($fieldName)) {
                if ($oldFilePath && File::exists($oldFilePath)) {
                    File::delete($oldFilePath);
                }

                $uploadedFile = $request->file($fieldName);
                $extension = $uploadedFile->getClientOriginalExtension();
                $filenameToStore = strtoupper($fieldName) . '_' . time() . '.' . $extension;

                $folderPath = public_path("document/member/{$userId}/{$subfolder}");
                
                if (!File::exists($folderPath)) {
                    File::makeDirectory($folderPath, 0777, true);
                }

                $newFilePath = "{$folderPath}/{$filenameToStore}";
                $uploadedFile->move($folderPath, $filenameToStore);

                return $newFilePath;
            } elseif ($oldFilePath) {
                if (File::exists($oldFilePath)) {
                    File::delete($oldFilePath);
                }
            }

            return $oldFilePath;
        }

        
        $infoDocument = $user->infoDocument;
        if ($request->hasFile('trade_licence')) {
            $infoDocument->trade_licence = uploadFile($request, 'trade_licence', 'trade', $userId, $infoDocument->trade_licence);
        } elseif ($request->hasFile('tin_certificate')) {
            $infoDocument->tin_certificate = uploadFile($request, 'tin_certificate', 'tin', $userId, $infoDocument->tin_certificate);
        } elseif ($request->hasFile('nid_photo_copy')) {
            $infoDocument->nid_photo_copy = uploadFile($request, 'nid_photo_copy', 'nid', $userId, $infoDocument->nid_photo_copy);
        } elseif ($request->hasFile('passport_photo')) {
            $infoDocument->passport_photo = uploadFile($request, 'passport_photo', 'passport', $userId, $infoDocument->passport_photo);
        } elseif ($request->hasFile('edu_certificate')) {
            $infoDocument->edu_certificate = uploadFile($request, 'edu_certificate', 'edu', $userId, $infoDocument->edu_certificate);
        } elseif ($request->hasFile('experience_certificate')) {
            $infoDocument->experience_certificate = uploadFile($request, 'experience_certificate', 'experience', $userId, $infoDocument->experience_certificate);
        } elseif ($request->hasFile('stu_id_copy')) {
            $infoDocument->stu_id_copy = uploadFile($request, 'stu_id_copy', 'stu', $userId, $infoDocument->stu_id_copy);
        } elseif ($request->hasFile('recoment_letter')) {
            $infoDocument->recoment_letter = uploadFile($request, 'recoment_letter', 'recommend', $userId, $infoDocument->recoment_letter);
        }

        $infoDocument->status = 1;
        $infoDocument->member_id = $userId;
        $infoDocument->save();

        $notification = array('messege' => 'information_edit successfully!', 'alert-type' => 'update');
        return redirect()->back()->with($notification);
    }
}
