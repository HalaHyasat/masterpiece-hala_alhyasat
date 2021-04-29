<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $table = "chats";
    public $primaryKey = 'id';
    public $timestamps = true;


    public function senderUser()
    {
        return $this->belongsTo(User::class, 'sender');
    }

    public function receiverUser()
    {
        return $this->belongsTo(User::class, 'receiver');
    }

}
