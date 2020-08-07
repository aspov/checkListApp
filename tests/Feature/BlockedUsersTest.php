<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;
use App\CheckList;

class BlockedUsersTest extends TestCase
{
    public function testBlockedUsers()
    {
        $user = factory(User::class)->create();
        $user->status = 'blocked';
        $response = $this->actingAs($user)->get(route('account.index'));
        $response->assertRedirect(route('block'));
    }

    public function testRedirectFromBlockedPage()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->get(route('block'));
        $response->assertRedirect(route('home'));
    }
}
