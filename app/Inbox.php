<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inbox extends Model
{
    protected $table = "inboxes";

    protected $fillable = [
        'chat_id', 'nama_kontak', 'pesan', 'status', 'from', 'reply_by'
    ];
}
