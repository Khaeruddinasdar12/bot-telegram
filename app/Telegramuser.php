<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Telegramuser extends Model
{
    protected $table = 'telegram_users';
    protected $fillable = [
        'nama_kontak'
    ];

    public function chat() {
    	return $this->hasMany('App\Inbox', 'chat_id')->orderBy('created_at', 'asc');
    }

}
