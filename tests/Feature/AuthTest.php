<?php

namespace Tests\Feature;

use App\Models\Customer;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    public function test_login_screen_can_be_rendered()
    {
        $response = $this->get(app()->getLocale() .'/login');

        $response->assertStatus(200);
    }

    public function test_users_can_authenticate_using_the_login_screen()
    {
        $customer = Customer::factory()->create();

        $response = $this->post(app()->getLocale() . '/login', [
            'email' => $customer->email,
            'password' => 'password',
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect(app()->getLocale() . '/customer/orders');
    }

    public function test_users_can_not_authenticate_with_invalid_password()
    {
        $customer = Customer::factory()->create();

        $this->post(app()->getLocale() .'/login', [
            'email' => $customer->email,
            'password' => 'wrong-password',
        ]);

        $this->assertGuest();
    }
}
