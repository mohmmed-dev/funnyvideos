<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class view extends Model
{
    /** @use HasFactory<\Database\Factories\ViewFactory> */
    use HasFactory;

      protected $fillable = [
        'user_id',
        'video_id',
        'views',
    ];

    public function video() {
        return $this->belongsTo(Video::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
