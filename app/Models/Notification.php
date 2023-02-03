<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    protected $table = 'notifications';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'type',
        'notifiable',
        'data',
        'read_at',
        'notifiable_type',
        'notifiable_id',
        'order_id'
    ];
    public function order()
    {
        return $this->belongsTo(Order::class);
    }


}
