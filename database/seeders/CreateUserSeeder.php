<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

use App\Models\Member\InfoPersonal;
use App\Models\Member\InfoChildDetails;
use App\Models\Member\InfoAcademic;
use App\Models\Member\InfoCompany;
use App\Models\Member\InfoStudent;
use App\Models\Member\InfoOther;
use App\Models\Member\InfoDocument;
use App\Models\User;

class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $super_admin = User::create([
            'name'=>'IDAB',
            'email_verified_at' => '2002-01-01',
            'email'=>'admin@gmail.com',
            'status' => '1',
            'is_admin' => '1',
            'is_approve' => '1',
            'password'=>bcrypt('password'),
            'profile_photo_path'=>'fix/admin.jpg',
            'member_type_id'=> '1',
        ]);
        InfoPersonal::create([
            'contact_number'=>'01909302126',
            'member_id'=> $super_admin->id,
        ]);
        InfoChildDetails::create([
            'status'=>'1',
            'member_id'=> $super_admin->id,
        ]);
        // InfoAcademic::create([
        //     'mast_qualification_id'=>'1',
        //     'status'=>'1',
        //     'member_id'=> $super_admin->id,
        // ]);
        InfoCompany::create([
            'status'=>'1',
            'member_id'=> $super_admin->id,
        ]);
        InfoStudent::create([
            'status'=>'1',
            'member_id'=> $super_admin->id,
        ]);
        InfoOther::create([
            'status'=>'1',
            'member_id'=> $super_admin->id,
        ]);
        InfoDocument::create([
            'status'=>'1',
            'member_id'=> $super_admin->id,
        ]);
        
        /**
         * ___________________________________________________2
         */
        $admin = User::create([
            'name'=>'Member',
            'email'=>'member@gmail.com',
            'email_verified_at' => '2000-01-01',
            'status' => '1',
            'is_admin' => '1',
            'is_approve' => '1',
            'password'=>bcrypt('password'),
            'profile_photo_path'=>'fix/member.jpg',
            'member_type_id'=> '1',
        ]);
        InfoPersonal::create([
            'contact_number'=>'01909302126',
            'member_id'=> $admin->id,
        ]);
        InfoChildDetails::create([
            'status'=>'1',
            'member_id'=> $admin->id,
        ]);
        // InfoAcademic::create([
        //     'mast_qualification_id'=>'1',
        //     'status'=>'1',
        //     'member_id'=> $admin->id,
        // ]);
        InfoCompany::create([
            'status'=>'1',
            'member_id'=> $admin->id,
        ]);
        InfoStudent::create([
            'status'=>'1',
            'member_id'=> $admin->id,
        ]);
        InfoOther::create([
            'status'=> '1',
            'member_id'=> $admin->id,
        ]);
        InfoDocument::create([
            'status'=> '1',
            'member_id'=> $admin->id,
        ]);

    }
}
