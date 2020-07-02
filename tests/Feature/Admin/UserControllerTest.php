<?php

namespace Tests\Feature\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Database\Seeds\PermissionsDemoSeeder;

class UserControllerTest extends TestCase
{
    public function testAuth()
    {
        $response = $this->get(route('admin.users.index'));
        $response->assertRedirect(route('login'));
    }

    public function testUserAccess()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->get(route('admin.users.index'));
        $response->assertStatus(403);
    }

    public function testIndex()
    {
        $this->seed(PermissionsDemoSeeder::class);
        $user = factory(User::class)->create();
        $admin = User::role('admin')->first();
        #print_r(\DB::getDatabaseName());        
        $response = $this->actingAs($admin)->get(route('admin.users.index'));
        $response->assertStatus(200);
        $users = $response->viewData('users');
        $this->assertTrue(count($users) == 1);
    }

    public function testEdit()
    {
        $this->seed(PermissionsDemoSeeder::class);
        $user = factory(User::class)->create();
        $admin = User::role('admin')->first();
        $response = $this->actingAs($admin)->get(route('admin.users.edit', $user));
        $response->assertStatus(200);
    }

    public function testUpdate()
    {
        $this->seed(PermissionsDemoSeeder::class);
        $user = factory(User::class)->create();
        $admin = User::role('admin')->first();
        $checkListLimit = ['check_lists_limit' => 10];
        $response = $this->actingAs($admin)->patch(route('admin.users.update', $user), $checkListLimit);
        $response->assertSessionHasNoErrors();
        $response->assertRedirect(route('admin.users.edit', $user));
        $this->assertDatabaseHas('users', $checkListLimit);
    }
}
