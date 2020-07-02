<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\User;

class MyAccountControllerTest extends TestCase
{
    public function testAuth()
    {
        $response = $this->get(route('account.index'));
        $response->assertRedirect(route('login'));
    }

    public function testIndex()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->get(route('account.index'));
        $response->assertRedirect(route('account.show', $user->name));
    }

    public function testEdit()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->get(route('account.edit', $user));
        $response->assertStatus(200);
    }

    public function testUpdate()
    {
        $user = factory(User::class)->create();
        $updatedUser = factory(User::class)->make();
        $updatedUserData = \Arr::only($updatedUser->toArray(), ['name', 'email']);
        $response = $this->actingAs($user)->patch(route('account.update', $user), $updatedUserData);
        $response->assertSessionHasNoErrors();
        $response->assertStatus(200);
        $this->assertDatabaseHas('users', $updatedUserData);
    }

    public function testDestroy()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->delete(route('account.destroy', $user));
        $response->assertSessionHasNoErrors();
        $response->assertStatus(302);
        $this->assertDatabaseMissing('users', ['id', $user->id]);
    }
}
