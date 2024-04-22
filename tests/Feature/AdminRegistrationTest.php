<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AdminRegistrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_registration_admin_screen_can_be_rendered()
    {
        $response = $this->get(app()->getLocale(), (array)'/admin/TyRLsvMqw/register');

        $response->assertStatus(200);
    }

//    public function test_admin_can_be_registered()
//    {
//        $this->post(app()->getLocale() . '/admin/TyRLsvMqw/register', [
//            'name' => 'Administrator',
//            'email' => 'admin@github2.com',
//            'address' => 'Via Zuavo',
//            'password' => '1234567',
//            'password_confirmation' => '1234567'
//        ]);
//
//        $this->assertAuthenticated();
//    }

}
