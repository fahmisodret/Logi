<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Storage;
use Illuminate\Http\Request;
use App\Traits\UploadTrait;


class Fasilitas extends Model
{
	use UploadTrait;
    protected $fillable = ['project_id', 'name', 'image', 'keterangan'];

    // upload image trait
    protected $imagePath = 'storage/upload/fasilitas/';
    protected $resize = true;
    public $w = 350;
    public $h = 200;

    public function getImageUrlAttribute()
    {
        return Storage::url('upload/fasilitas/'.$this->image);
    }

    public function galery()
    {
        return $this->hasMany('App\Galery', 'fasilitas_id');
    }

    public function project()
    {
        return $this->belongsTo('App\Project', 'project_id');
    }
}
