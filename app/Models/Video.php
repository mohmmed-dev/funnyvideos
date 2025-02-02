<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute ;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    /** @use HasFactory<\Database\Factories\VideoFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'slug',
        'title',
        'desc',
        'video_path',
        'image_path',
        'quality',
        'hours',
        'minutes',
        'seconds',
        'processed',
        'longitudinal',
    ];

    public function imagePath(): Attribute {
        return Attribute::make(
            get : fn (string $value) => asset('storage/images/' . $value),
        );
    }

    public function title(): Attribute {
        return Attribute::make(
            set : fn (string $value) => [
                'title' => $value,
                'slug' => preg_replace('/ /','-',$value)
            ],
        );
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function view() {
        return $this->hasOne(View::class);
    }

    public function hashtags() {
        return $this->belongsToMany(Hashtag::class);
    }

    public function comments() {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function Convertedvideo() {
        return $this->hasOne(Convertedvideo::class);
    }

    public function moreVideos() {
        return $this->with(["view"])->where('processed',true)->get()->shuffle()->take(10);
    }

    public function likes() {
        return $this->belongsToMany(User::class,'likes')->withPivot('like')->withTimestamps();
    }

    public function user_video() {
        return $this->belongsToMany(User::class)->withTimestamps()->withPivot('id');
    }

    public function ifUserHas($id) {
        return $this->user_video()->where('user_id',$id)->exists();
    }

    public function isLiked($user) {
        return $this->likes()->where('user_id', $user->id)->exists() ;
    }

    public function IsUserLiked($user) {
        if($this->isLiked($user)) {
            return $this->likes()->where('user_id', $user->id)->first()->pivot->like ? true : false ;
        };
        return null;
    }

    public function changedLike($user) {
        return $this->likes()->where('user_id', $user->id)->first()->pivot->like  ;
    }

    public function countOfLike() {
    return $this->likes()->where('like', 1)->count();
    }

    public function countOfUnLike() {
    return $this->likes()->where('like', 0)->count();
    }

    public function NumberOfViews() {
        return $this->view->views ?? 0;
    }

    public function getVideoComments() {
        return $this->comments()->where('parent_id' ,0)->get();
    }

    public function getVideoCommentsForComment($id) {
        return $this->comments()->where('parent_id' ,$id)->get();
    }

    // public function
    // public function AddNewView() {
    //     $this->view->views = 1;
    //     $this->view->save();
    //     dump($this->view->views);
    //     return ;
    // }

}
