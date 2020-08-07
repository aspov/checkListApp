<?php

namespace Tests\Feature\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;
use App\CheckList;

class CheckListControllerTest extends TestCase
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
        $user->checkLists()->save(factory(CheckList::class)->make());
        $admin = User::role('admin')->get()->first();
        $response = $this->actingAs($admin)->get(route('admin.check_lists.index'));
        $response->assertStatus(200);
        $checkLists = $response->viewData('checkLists');
        $this->assertTrue(count($checkLists) == 1);
    }

    public function testsShow()
    {
        $user = factory(User::class)->create();
        $cheklist = factory(CheckList::class)->make();
        $user->checkLists()->save($cheklist);
        $admin = User::role('admin')->get()->first();
        $response = $this->actingAs($admin)->get(route('admin.check_lists.show', $cheklist));
        $response->assertStatus(200);
    }
}
