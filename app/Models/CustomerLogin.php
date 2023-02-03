<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerLogin extends Model
{
    use HasFactory;
    protected $table = 'customer_login_history';

    protected $fillable  = ['name','email', 'IP', 'browser'];
}
