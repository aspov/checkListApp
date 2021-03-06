<?php

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
        Permission::create(['name' => 'edit users']);
        Permission::create(['name' => 'edit checklists']);
        Permission::create(['name' => 'edit roles']);
        Permission::create(['name' => 'edit permissions']);

        // create roles and assign existing permissions
        $role1 = Role::create(['name' => 'admin']);
        $role2 = Role::create(['name' => 'super-admin']);
    }
}
