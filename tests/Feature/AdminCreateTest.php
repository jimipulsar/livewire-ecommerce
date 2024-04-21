<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AdminCreateTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_user_create()
    {
        $user = new User();

        $user->setFirstName('Admin');
        $user->setAddress('Station Street');
        $user->setEmailAddress('jimipulsar@github.com');
        $user->setPassword('123456');

        $this->assertEquals($user->getFirstName(), 'Admin');
        $this->assertEquals($user->getAddress(), 'Station Street');
        $this->assertEquals($user->getEmailAddress(), 'jimipulsar@github.com');
        $this->assertEquals($user->getPassword(), '123456');

    }
}
