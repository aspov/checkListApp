<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PermissionsDemoSeeder;
use TestUsersSeeder;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(PermissionsDemoSeeder::class);
        $this->seed(TestUsersSeeder::class);
        #print_r(\DB::getDatabaseName());
    }
}
