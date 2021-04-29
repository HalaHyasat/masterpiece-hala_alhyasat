<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = "users";
    public $primaryKey = 'id';
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'image',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class, 'user_id', 'id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'user_id', 'id');
    }

    public function replays()
    {
        return $this->hasMany(Replay::class, 'user_id', 'id');
    }

    public function pages()
    {
        return $this->hasMany(Page::class, 'user_id', 'id');
    }

    public function PostLikes()
    {
        return $this->belongsToMany(Post::class, 'post_users', 'user_id', 'post_id');
    }

    public function CommentLikes()
    {
        return $this->belongsToMany(Comment::class, 'comment_users', 'user_id', 'comment_id');
    }

    public function connections()
    {
        return $this->hasMany(Connection::class, 'user_id', 'id');
    }

    public function connection()
    {
        return $this->hasMany(Connection::class, 'friend_id', 'id');
    }

    public function chats()
    {
        return $this->hasMany(Chat::class, 'sender', 'id');
    }

    public function chat()
    {
        return $this->hasMany(Chat::class, 'receiver', 'id');
    }
}
