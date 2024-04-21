<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

//    public $first_name;
//    public $address;
//    public $email;
//    public $password;

    protected $guard = 'admin';
    protected $table = 'users';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'address',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

//    public function setFirstName($firstName)
//    {
//        $this->first_name = $firstName;
//
//    }
//
//    public function getFirstName()
//    {
//        return $this->first_name;
//    }
//
//    public function setAddress($addressName)
//    {
//        $this->address = $addressName;
//
//    }
//
//    public function getAddress()
//    {
//        return $this->address;
//    }
//
//    public function setEmailAddress($emailAddress)
//    {
//        $this->email = $emailAddress;
//
//    }
//
//    public function getEmailAddress()
//    {
//        return $this->email;
//    }
//
//    public function setPassword($passwordName)
//    {
//        $this->password = $passwordName;
//
//    }
//
//    public function getPassword()
//    {
//        return $this->password;
//    }

    public function sliders()
    {
        return $this->hasMany(Slider::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function brands()
    {
        return $this->hasMany(Brand::class);
    }

}
