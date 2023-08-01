<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Admin\InfoPersonal;
use App\Models\Admin\InfoAcademic;
use App\Models\Admin\InfoFamily;
use App\Models\Admin\InfoOther;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Zakiul = User::create([
            'name'=>'PUNE COLLEGE',
            'email'=>'zakiulalam@iconisl.com',
            'batch'=>'1995',
            'contact_number'=>'01711136108',
            'email_verified_at' => '2000-01-01',
            'status' => '1',
            'is_admin' => '1',
            'is_admin' => '1',
            'cm_adviser' => '1',
            'cm_ecommittee' => '1',
            'cm_welfare' => '1',
            'pune_member' => '1',
            'password'=>bcrypt('password'),
            'profile_photo_path'=>'fix/blank.jpg',
        ]);
        InfoPersonal::create([
            'address'=>'Gulshan',
            'city'=>'Dhaka',
            'user_id'=>'3',
        ]);
        InfoAcademic::create([
            'user_id'=>'3',
        ]);
        InfoOther::create([
            'designation'=>'Deputy General Manager',
            'company_name'=>'Bangladesh Bank, Head Office',
            'user_id'=>'3',
        ]);
        $Arifur = User::create([
            'name'=>'WADIA COLLEGE',
            'email'=>'arif@iconisl.com',
            'batch'=>'1995',
            'contact_number'=>'01720012715',
            'email_verified_at' => '2000-01-01',
            'status' => '1',
            'is_admin' => '1',
            'is_admin' => '1',
            'cm_adviser' => '1',
            'cm_ecommittee' => '1',
            'cm_welfare' => '0',
            'pune_member' => '1',
            'password'=>bcrypt('password'),
            'profile_photo_path'=>'fix/blank.jpg',
        ]);
        InfoPersonal::create([
            'address'=>'Gulshan',
            'city'=>'Dhaka',
            'user_id'=>'4',
        ]);
        InfoAcademic::create([
            'user_id'=>'4',
        ]);
        InfoOther::create([
            'designation'=>'Managing director',
            'company_name'=>'Icon Information Systems Ltd.',
            'user_id'=>'4',
        ]);
        $Chisty = User::create([
            'name'=>'FARGUSSION COLLEGE',
            'email'=>'chisty@iconisl.com',
            'batch'=>'1993',
            'contact_number'=>'01XXXXXXXXX',
            'email_verified_at' => '2000-01-01',
            'status' => '1',
            'is_admin' => '1',
            'cm_adviser' => '1',
            'cm_ecommittee' => '1',
            'cm_welfare' => '0',
            'pune_member' => '1',
            'password'=>bcrypt('password'),
            'profile_photo_path'=>'fix/blank.jpg',
        ]);
        InfoPersonal::create([
            'address'=>'Gulshan',
            'city'=>'Dhaka',
            'user_id'=>'5',
        ]);
        InfoAcademic::create([
            'user_id'=>'5',
        ]);
        InfoOther::create([
            'designation'=>'Deputy Managing Director',
            'company_name'=>'Icon Information Systems Ltd.',
            'user_id'=>'5',
        ]);
        $Pune = User::create([
            'name'=>'SYMBIOSIS COLLEGE',
            'email'=>'pune@iconisl.com',
            'batch'=>'1993',
            'contact_number'=>'01XXXXXXXXX',
            'email_verified_at' => '2000-01-01',
            'status' => '1',
            'is_admin' => '1',
            'cm_adviser' => '1',
            'cm_ecommittee' => '1',
            'cm_welfare' => '0',
            'pune_member' => '1',
            'password'=>bcrypt('password'),
            'profile_photo_path'=>'fix/blank.jpg',
        ]);
        InfoPersonal::create([
            'address'=>'Gulshan',
            'city'=>'Dhaka',
            'user_id'=>'5',
        ]);
        InfoAcademic::create([
            'user_id'=>'5',
        ]);
        InfoOther::create([
            'designation'=>'Deputy Managing Director',
            'company_name'=>'Icon Information Systems Ltd.',
            'user_id'=>'5',
        ]);

        $Zakiul->assignRole('Member');
        $Arifur->assignRole('Member');
        $Chisty->assignRole('Member');
        $Pune->assignRole('Member');
    }
}
