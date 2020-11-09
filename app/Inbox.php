<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inbox extends Model
{
    protected $table = "inboxes";

    protected $fillable = [
        'chat_id', 'pesan', 'status', 'from', 'reply_by'
    ];

    public function telegramuser()
    {
        return $this->belongsTo('App\Telegramuser', 'chat_id');
    }

    public function admin()
    {
        return $this->belongsTo('App\User', 'reply_by');
    }
}
