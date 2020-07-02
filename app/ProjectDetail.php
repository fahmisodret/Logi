<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Storage;

class ProjectDetail extends Model
{
    protected $fillable = [
		'project_id', 'title', 'subtitle', 'image', 'keterangan', 
    ];

    public function getImageUrlAttribute()
    {
        return Storage::url('upload/project_detail/'.$this->image);
    }

    public function project()
    {
        return $this->belongsTo('App\Project', 'project_id');
    }

    public function galery()
    {
        return $this->hasMany('App\Galery', 'detail_id');
    }
}
