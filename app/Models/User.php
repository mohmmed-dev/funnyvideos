<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable,HasProfilePhoto;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'block',
        'level',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // public function profilePhotoPath(): Attribute {
    //     return Attribute::make(
    //         get: fn  ( $value) => asset('storage/images/' . $value),
    //     );
    // }


        public function profilePhotoPath() {
        $image =  $this->profile_photo_path;
        if(strpos($image,'ui-avatars.com') > 0) {
            return $image;
        }
        return asset('storage/'. $image);
    }
    public function alert() {
        return $this->hasOne(Alert::class);
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }

    public function videos() {
        return $this->hasMany(Video::class);
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public function records() {
        return $this->belongsToMany(Video::class)->withPivot(['id']);
    }

    public function likes() {
        return $this->belongsToMany(Video::class,'likes');
    }

    public function views() {
        return $this->hasMany(View::class);
    }

    public function watch() {
        return $this->belongsToMany(Video::class)->withTimestamps();
    }

    public function numberOfWatching() {
        return $this->views()->sum('views');
    }

    public function isAdmin() {
        return $this->level > 0 ? true : false;
    }

    public function isSuperAdmin() {
        return $this->level > 1 ? true : false;
    }
    public function isBlock() {
        return $this->block > 0 ? true : false;
    }


    // public function {
    //     return $this->level;
    // }
}
