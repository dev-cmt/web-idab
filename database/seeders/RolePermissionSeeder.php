<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\Admin\InfoPersonal;
use App\Models\Admin\InfoAcademic;
use App\Models\Admin\InfoFamily;
use App\Models\Admin\InfoOther;
use App\Models\User;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $super_admin = User::create([
            'name'=>'Pune Club',
            'batch'=>'55',
            'contact_number'=>'01909302126',
            'email_verified_at' => '2000-01-01',
            'email'=>'admin@gmail.com',
            'status' => '1',
            'is_admin' => '1',
            'password'=>bcrypt('password'),
            'profile_photo_path'=>'fix/admin.jpg',
        ]);
        InfoPersonal::create([
            'address'=>'Shariatpur',
            'city'=>'Dhaka',
            'number_child'=>'0',
            'marrital_status'=>'0',
            'user_id'=>'1',
        ]);
        InfoAcademic::create([
            'collage'=>'Pune College',
            'subject'=>'Computer Science',
            'degree'=>'2',
            'passing_year'=>'1995',
            'passing_year'=>'1995',
            'user_id'=>'1',
        ]);
        InfoOther::create([
            'designation'=>'Super Admin',
            'company_name'=>'Icon Information Systems Ltd.',
            'user_id'=>'1',
        ]);

        $admin = User::create([
            'name'=>'Member',
            'batch'=>'55',
            'contact_number'=>'01909302126',
            'email'=>'member@gmail.com',
            'email_verified_at' => '2000-01-01',
            'status' => '1',
            'is_admin' => '1',
            'password'=>bcrypt('password'),
            'profile_photo_path'=>'fix/member.jpg',
        ]);
        InfoPersonal::create([
            'address'=>'Shariatpur',
            'city'=>'Dhaka',
            'number_child'=>'0',
            'marrital_status'=>'0',
            'user_id'=>'2',
        ]);
        InfoAcademic::create([
            'collage'=>'Pune College',
            'subject'=>'Computer Science',
            'degree'=>'2',
            'passing_year'=>'1995',
            'passing_year'=>'1995',
            'user_id'=>'2',
        ]);
        InfoOther::create([
            'designation'=>'Admin',
            'company_name'=>'Icon Information Systems Ltd.',
            'user_id'=>'2',
        ]);

        /*__________________________________________________________ */
        /*__________________________________________________________ */

        $super_admin_role = Role::create(['name' => 'Super-Admin']);
        $admin_role = Role::create(['name' => 'Admin']);
        $member_role = Role::create(['name' => 'Member']);

        $permissions = [
            /*_____Menu Access_____*/
            ['name' => 'Setting access'],
            ['name' => 'Pages access'],
            
            //-----Gallery Access
            ['name' => 'Gallery access'],
            ['name' => 'Gallery create'],
            ['name' => 'Gallery edit'],
            ['name' => 'Gallery delete'],

            //-----Member Access
            ['name' => 'Member access'],
            ['name' => 'Approve Member'],
            ['name' => 'Member create'],
            ['name' => 'Member edit'],
            ['name' => 'Member delete'],
            
            //-----User Access
            ['name' => 'User access'],
            ['name' => 'User create'],
            ['name' => 'User edit'],
            ['name' => 'User delete'],
            
            //-----Role Access
            ['name' => 'Role access'],
            ['name' => 'Role create'],
            ['name' => 'Role edit'],
            ['name' => 'Role delete'],
        ];

        foreach ($permissions as $item) {
            Permission::create($item);
        }

        $super_admin->assignRole($super_admin_role);
        $admin->assignRole($admin_role);

        $super_admin_role->givePermissionTo(Permission::all());
        $admin_role->givePermissionTo('Gallery access');

    }
}
