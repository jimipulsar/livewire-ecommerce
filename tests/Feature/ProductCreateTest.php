<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductCreateTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use RefreshDatabase;

    public function test_login_admin_can_be_rendered()
    {
        $response = $this->get(app()->getLocale() .'/TyRLsvMqw');

        $response->assertStatus(200);
    }

//    public function test_admins_can_authenticate_using_the_login_screen()
//    {
//        $user = User::factory()->create();
//
//        $response = $this->post(app()->getLocale() . '/TyRLsvMqw', [
//            'email' => $user->email,
//            'password' => 'password',
//        ]);
//
//        $this->assertAuthenticated();
//        $response->assertRedirect(app()->getLocale() . '/admin-orders');
//    }

//    public function test_admin_registered()
//    {
//        $user = User::factory()->create();
//
//        $response = $this->post(app()->getLocale() . '/TyRLsvMqw/register', [
//            'name' => $user->name,
//            'email' => $user->email,
//            'address' => $user->address,
//            'password' => 'password',
//        ]);
//
//        $this->assertAuthenticated();
//        $response->assertRedirect(app()->getLocale() . '/admin-orders');
//    }

//    public function test_product_page_creation_can_be_rendered()
//    {
//        $product = Product::factory()->create();
//
//        $response = $this->post(app()->getLocale() . '/admin/products/create', [
//            'item_name' => $product->item_name,
//            'slug' =>  $product->slug,
//            'user_id' =>  $product->user_id,
//            'price' =>  $product->price,
//            'item_code' =>  $product->item_code,
//            'img_01' =>  $product->img_01,
//            'published' =>  $product->published,
//            'purchasable' =>  $product->purchasable,
//            'quantity' =>  $product->quantity,
//        ]);
//
//        $this->assertGuest();
//    }
}
