<?php

namespace App\Models;

use App\Notifications\MailResetPasswordToken;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Customer extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $guard = 'customer';
    protected $table = 'customers';
    protected $guarded = [];

    protected $fillable = [
        'email',
        'shipping_name',
        'shipping_surname',
        'shipping_company',
        'shipping_vat',
        'shipping_address',
        'shipping_city',
        'shipping_country',
        'shipping_province',
        'shipping_zipcode',
        'shipping_phone',
        'billing_name',
        'billing_surname',
        'billing_company',
        'billing_vat',
        'billing_address',
        'billing_city',
        'billing_country',
        'billing_province',
        'billing_zipcode',
        'billing_phone',
        'email_verified_at', 'password'];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new MailResetPasswordToken($token));
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function wishlist()
    {
        return $this->hasMany(Wishlist::class);
    }

    public function profile()
    {
        return $this->hasOne(Customer::class);
    }
}
