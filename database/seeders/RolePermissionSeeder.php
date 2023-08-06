<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\Member\InfoPersonal;
use App\Models\Member\InfoAcademic;
use App\Models\Member\InfoFamily;
use App\Models\Member\InfoOther;
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
            'name'=>'IDAB',
            'contact_number'=>'01909302126',
            'email_verified_at' => '2002-01-01',
            'email'=>'admin@gmail.com',
            'status' => '1',
            'is_admin' => '1',
            'password'=>bcrypt('password'),
            'profile_photo_path'=>'fix/admin.jpg',
        ]);
        

        $admin = User::create([
            'name'=>'Member',
            'contact_number'=>'01909302126',
            'email'=>'member@gmail.com',
            'email_verified_at' => '2000-01-01',
            'status' => '1',
            'is_admin' => '1',
            'password'=>bcrypt('password'),
            'profile_photo_path'=>'fix/member.jpg',
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
