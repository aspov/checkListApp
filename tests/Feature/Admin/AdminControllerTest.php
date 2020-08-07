<?php

namespace Tests\Feature\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;

class AdminControllerTest extends TestCase
{
    public function testAuth()
    {
        $response = $this->get(route('admin.admins.index'));
        $response->assertRedirect(route('login'));
    }

    public function testUserAccess()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->get(route('admin.admins.index'));
        $response->assertStatus(403);
    }

    public function testAdminAccess()
    {
        $admin = User::role('admin')->get()->first();
        $response = $this->actingAs($admin)->get(route('admin.admins.index'));
        $response->assertStatus(403);
    }

    public function testIndex()
    {
        $superAdmin = User::role('super-admin')->get()->first();
        $response = $this->actingAs($superAdmin)->get(route('admin.admins.index'));
        $response->assertStatus(200);
        $users = $response->viewData('users');
        $this->assertTrue(count($users) == 1);
    }

    public function testEdit()
    {
        $user = User::role('admin')->get()->first();
        $superAdmin = User::role('super-admin')->get()->first();
        $response = $this->actingAs($superAdmin)->get(route('admin.admins.edit', $user));
        $response->assertStatus(200);
    }

    public function testUpdate()
    {
        $admin = User::role('admin')->get()->first();
        $superAdmin = User::role('super-admin')->get()->first();
        $permissions = ['permissions' => ['']];
        $response = $this->actingAs($superAdmin)->patch(route('admin.admins.update', $admin), $permissions);
        $response->assertSessionHasNoErrors();
        $response->assertRedirect(route('admin.admins.edit', $admin));
        $this->assertTrue(count($admin->permissions) == 0);
    }
}
