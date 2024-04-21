<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AdminRegistrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_registration_admin_screen_can_be_rendered()
    {
        $response = $this->get(app()->getLocale(), (array)'/admin/TyRLsvMqw');

        $response->assertStatus(200);
    }

    public function test_new_admins_can_register()
    {
        $this->post(app()->getLocale() . '/admin/TyRLsvMqw', [
            'email' => 'admin@github2.com',
            'name' => 'John',
            'address' => 'Via Stolti 12',
            'password' => '1234567',
            'password_confirmation' => '1234567',
        ]);

        $this->assertAuthenticated();
    }
}
