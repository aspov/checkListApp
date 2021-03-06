<?php

namespace Tests\Feature\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

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
        $user = factory(User::class)->create();
        $admin = User::role('admin')->get()->first();
        $response = $this->actingAs($admin)->get(route('admin.users.index'));
        $response->assertStatus(200);
        $users = $response->viewData('users');
        $roles = $users->pluck('roles')->flatten()->all();
        $this->assertTrue(count($roles) == 0);
    }

    public function testEdit()
    {
        $user = factory(User::class)->create();
        $admin = User::role('admin')->get()->first();
        $response = $this->actingAs($admin)->get(route('admin.users.edit', $user));
        $response->assertStatus(200);
    }

    public function testUpdate()
    {
        $faker = \Faker\Factory::create();
        $user = factory(User::class)->create();
        $admin = User::role('admin')->get()->first();
        $checkListLimit = ['check_lists_limit' => $faker->randomDigit];
        $response = $this->actingAs($admin)->patch(route('admin.users.update', $user), $checkListLimit);
        $response->assertSessionHasNoErrors();
        $response->assertRedirect(route('admin.users.edit', $user));
        $this->assertDatabaseHas('users', $checkListLimit);
    }
}
