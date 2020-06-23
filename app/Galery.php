<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Storage;

class Galery extends Model
{
    protected $fillable = ['name','image'];

    public function getImageUrlAttribute()
    {
        return Storage::url('upload/galery/'.$this->image);
    }
}
