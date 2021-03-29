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
    
    public function getCreatedAtAttribute()
	{
		return \Carbon\Carbon::parse($this->attributes['created_at'])
		// ->diffForHumans();
		->translatedFormat('l, d F Y');
	}
	
	public function getUpdatedAtAttribute()
	{
		return \Carbon\Carbon::parse($this->attributes['updated_at'])
		->diffForHumans();
	}

}
