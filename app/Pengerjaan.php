<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengerjaan extends Model
{
    public function chat()
    {
        return $this->belongsTo('App\Inbox', 'inboxes_id');
    }
    
    public function getCreatedAtAttribute()
	{
		return \Carbon\Carbon::parse($this->attributes['created_at'])
		->diffForHumans();
	}
}
