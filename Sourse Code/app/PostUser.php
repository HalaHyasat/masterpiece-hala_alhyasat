<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostUser extends Model
{
    protected $table = "post_users";
    public $primaryKey = 'id';
    public $timestamps = true;
}
