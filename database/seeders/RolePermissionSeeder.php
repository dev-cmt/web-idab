<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
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
        /*__________________________________________________________ */
        /*__________________________________________________________ */

        $super_admin_role = Role::create(['name' => 'Super-Admin']);
        $admin_role = Role::create(['name' => 'Admin']);
        $member_role = Role::create(['name' => 'Member']);

        $permissions = [
            /*_____Menu Access_____*/
            ['name' => 'Pages'],
            ['name' => 'Setting'],

            //-----Gallery Access
            ['name' => 'Gallery access'],
            ['name' => 'Gallery create'],
            ['name' => 'Gallery edit'],
            ['name' => 'Gallery delete'],
            
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

            /*_____ WEB Access _____*/
            ['name' => 'Super-Admin'],
            ['name' => 'Admin'],
            ['name' => 'Guest'],
            
            ['name' => 'Create'],
            ['name' => 'Edit'],
            ['name' => 'Delete'],

            //-----Member Access
            ['name' => 'Member'],
            ['name' => 'Student Member'],
            ['name' => 'Candidate Member'],
            ['name' => 'Professional Member'],
            ['name' => 'Associate Member'],
            ['name' => 'Trade Member'],
            ['name' => 'Corporate Member'],

        ];

        foreach ($permissions as $item) {
            Permission::create($item);
        }
        
        $super_admin = User::findOrFail(1);
        $admin = User::findOrFail(2);

        $super_admin->assignRole($super_admin_role);
        $admin->assignRole($admin_role);

        // Give permissions to roles
        $permissions = Permission::all(); // Get all permissions

        $super_admin_role->syncPermissions($permissions);
        $admin_role->givePermissionTo('Gallery access');
    }
}
