<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionsDemoSeeder extends Seeder
{
    /**
     * Create the initial roles and permissions.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'create role']);
        Permission::create(['name' => 'show role']);
        Permission::create(['name' => 'edit role']);
        Permission::create(['name' => 'delete role']); 
        Permission::create(['name' => 'create user']);
        Permission::create(['name' => 'show user']);
        Permission::create(['name' => 'edit user']);
        Permission::create(['name' => 'delete user']); 

        $role3 = Role::create(['name' => 'super-admin', 'guard_name'=>'web']);
        // create roles and assign existing permissions
        $role1 = Role::create(['name' => 'writer','guard_name'=>'web']);
        $role1->givePermissionTo('show role');
        $role1->givePermissionTo('create role');
        $role1->givePermissionTo('edit role');
        $role1->givePermissionTo('show user');
        $role1->givePermissionTo('create user');
        $role1->givePermissionTo('edit user');

        $role2 = Role::create(['name' => 'admin', 'guard_name'=>'web']);
        $role2->givePermissionTo('show user');
        $role2->givePermissionTo('create user');
        $role2->givePermissionTo('edit user');
        $role2->givePermissionTo('delete user');
        $role2->givePermissionTo('show role');
        $role2->givePermissionTo('create role');
        $role2->givePermissionTo('edit role');

        // gets all permissions via Gate::before rule; see AuthServiceProvider

        // create demo users
        $user = \App\Models\User::factory()->create([
            'name' => 'Writer User',
            'email' => 'writer@ssgbd.com',
            'password' => bcrypt(12345678)
        ]);
        $user->assignRole($role1);
        $user->givePermissionTo('delete role'); // Only user permission

        $user = \App\Models\User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@ssgbd.com',
            'password' => bcrypt(12345678)
        ]);
        $user->assignRole($role2);

        $user = \App\Models\User::factory()->create([
            'name' => 'Super-Admin User',
            'email' => 'superadmin@ssgbd.com',
            'password' => bcrypt(12345678)
        ]);
        $user->assignRole($role3);
    }
}
