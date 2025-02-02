<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hashtag extends Model
{
    /** @use HasFactory<\Database\Factories\HashtagFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'desc',
    ];

    public function videos() {
        return $this->belongsToMany(Video::class);
    }

    public function name(): Attribute {
        return Attribute::make(
            set : fn ($value) => [
                'name' => $value,
                'slug' => preg_replace('/ /','-',$value)
            ],
        );
    }
}
