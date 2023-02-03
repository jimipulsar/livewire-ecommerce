<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;
    protected $table = 'sliders';
    protected $fillable = [
        'cover','title1', 'title2', 'title3'
    ];

    /**
     * Set the user's first name.
     *
     * @param  string  $value
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */


    public function admin(){
        return $this->belongsTo(User::class);
    }
}
