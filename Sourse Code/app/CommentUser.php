<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentUser extends Model
{
    protected $table = "comment_users";
    public $primaryKey = 'id';
    public $timestamps = true;
}
