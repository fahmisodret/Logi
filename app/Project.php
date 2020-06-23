<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Storage;

class Project extends Model
{
    protected $fillable = [
		'id', 'title', 'subtitle', 'image', 'keterangan', 
    ];

    public function getImageUrlAttribute()
    {
        return Storage::url('upload/project/'.$this->image);
    }
}
