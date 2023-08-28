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
            /*_____MENU ACCESS_____*/
            ['name' => 'Member menu access'],
            ['name' => 'Payment menu access'],
            ['name' => 'Post menu access'],
            ['name' => 'Setting menu access'],

            //---MEMBER => Approve
            ['name' => 'Member access'],
            ['name' => 'Member edit'],
            ['name' => 'Member view'],
            ['name' => 'Member delete'],

            //---MEMBER => Approve
            ['name' => 'Member approve access'],
            ['name' => 'Member approved'],
            ['name' => 'Member approve record'],

            //---DATA MEMBER => Committee Type
            ['name' => 'CommitteeType access'],
            ['name' => 'CommitteeType create'],
            ['name' => 'CommitteeType edit'],
            ['name' => 'CommitteeType view'],
            ['name' => 'CommitteeType delete'],

            //---DATA MEMBER => Member Type
            ['name' => 'MemberType access'],
            ['name' => 'MemberType create'],
            ['name' => 'MemberType edit'],
            ['name' => 'MemberType view'],
            ['name' => 'MemberType delete'],

            //---DATA MEMBER => Qualification
            ['name' => 'Qualification access'],
            ['name' => 'Qualification create'],
            ['name' => 'Qualification edit'],
            ['name' => 'Qualification view'],
            ['name' => 'Qualification delete'],

            //---PYMENT => Annual Fees
            ['name' => 'Annual fees access'],
            ['name' => 'Annual fees approved'],
            ['name' => 'Annual fees record'],

            //---PYMENT => Event Fees
            ['name' => 'Event fees access'],
            ['name' => 'Event fees approved'],
            ['name' => 'Event fees record'],

            //---PYMENT => Membership Fees
            ['name' => 'Membership fees access'],
            ['name' => 'Membership fees approved'],
            ['name' => 'Membership fees record'],

            //---DATA PAYMENT => Pyment Number
            ['name' => 'Pyment number access'],
            ['name' => 'Pyment number create'],
            ['name' => 'Pyment number edit'],
            ['name' => 'Pyment number view'],
            ['name' => 'Pyment number delete'],

            //---DATA PAYMENT => Pyment Fees
            ['name' => 'Pyment fees access'],
            ['name' => 'Pyment annual fees'],
            ['name' => 'Pyment membership fees'],

            //---POST => Gallery
            ['name' => 'Gallery access'],
            ['name' => 'Gallery create'],
            ['name' => 'Gallery edit'],
            ['name' => 'Gallery delete'],

            //---POST => Event
            ['name' => 'Event access'],
            ['name' => 'Event create'],
            ['name' => 'Event edit'],
            ['name' => 'Event delete'],
            
            //---SETTING => Contact
            ['name' => 'Contact access'],
            ['name' => 'Contact reply'],
            ['name' => 'Contact delete'],
            
            //---SETTING => Role
            ['name' => 'Role access'],
            ['name' => 'Role create'],
            ['name' => 'Role edit'],
            ['name' => 'Role delete'],

            //---SETTING => User
            ['name' => 'User access'],
            ['name' => 'User create'],
            ['name' => 'User edit'],
            ['name' => 'User delete'],

            /*_____ WEB ACCESS _____*/
            ['name' => 'Super-Admin'],
            ['name' => 'Admin'],
            ['name' => 'Member'],
            ['name' => 'Data Setting'],

            //-----MEMBER TYPE
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
        $admin_role->givePermissionTo(['Gallery access', 'Member']);
    }
}
