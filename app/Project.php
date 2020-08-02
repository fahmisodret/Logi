<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Storage;
use Illuminate\Http\Request;
use App\Traits\UploadTrait;

class Project extends Model
{
    use UploadTrait;
    protected $fillable = [
		'id', 'project_id', 'is_progres', 'title', 'slug', 'subtitle', 'image', 'keterangan', 
    ];

    // upload image trait
    protected $imagePath = 'storage/upload/project/';
    protected $resize = false;
    public $w = 500;
    public $h = 300;

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
