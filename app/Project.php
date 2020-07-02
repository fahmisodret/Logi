<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Storage;

class Project extends Model
{
    protected $fillable = [
		'id', 'title', 'slug', 'subtitle', 'image', 'keterangan', 
    ];

    public function getImageUrlAttribute()
    {
        return Storage::url('upload/project/'.$this->image);
    }

    public function detail()
    {
        return $this->hasMany('App\ProjectDetail', 'project_id');
    }

    public function fasilitas()
    {
        return $this->hasMany('App\Fasilitas', 'project_id');
    }

    public function galery()
    {
        return $this->hasMany('App\Galery', 'project_id');
    }
}
