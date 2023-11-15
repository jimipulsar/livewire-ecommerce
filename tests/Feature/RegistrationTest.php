<?php

namespace Tests\Feature;

use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    public function test_registration_screen_can_be_rendered()
    {
        $response = $this->get(app()->getLocale(), (array)'/register');

        $response->assertStatus(200);
    }

    public function test_new_users_can_register()
    {
        $response = $this->post('/it/register', [
            'email' => 'dsdfsdf@github2.com',
            'shipping_name' => 'Carlo',
            'billing_name' => 'Carlo',
            'billing_surname' => 'Rossi',
            'password' => '1234567',
            'password_confirmation' => '1234567',
        ]);

        $this->assertAuthenticated();
//        $response->assertRedirect(RouteServiceProvider::HOME);
    }
}
