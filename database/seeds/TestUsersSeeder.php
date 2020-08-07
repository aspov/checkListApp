<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class TestUsersSeeder extends Seeder
{
    /**
     * Create the initial roles and permissions.
     *
     * @return void
     */
    public function run()
    {
        // create demo users
        $user1 = factory(\App\User::class)->create([
            'name' => 'Super-Admin',
            'email' => 'superadmin@example.com',
            'password' => Hash::make(1111)
        ]);
        $user1->assignRole('super-admin');

        $user2 = factory(\App\User::class)->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make(1111)
        ]);
        $user2->assignRole('admin');
        $user2->givePermissionTo('edit users');

        $user3 = factory(\App\User::class)->create([
            'name' => 'User',
            'email' => 'user@example.com',
            'password' => Hash::make(1111)
        ]);
    }
}
