<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Storage;

class About extends Model
{
    protected $fillable = [
		'name', 'title', 'image', 'fb', 'twitter', 'in', 'status', 
	];

    public function getAvatarUrlAttribute()
    {
        return Storage::url('upload/about/'.$this->image);
    }
}
