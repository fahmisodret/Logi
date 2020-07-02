<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Storage;

class Galery extends Model
{
    protected $fillable = ['project_id', 'detail_id', 'fasilitas_id', 'name', 'image', 'keterangan'];
    protected $appends = ['image_url'];

    public function getImageUrlAttribute()
    {
        return Storage::url('upload/galery/'.$this->image);
    }
}
