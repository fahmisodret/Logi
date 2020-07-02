<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Storage;

class Slider extends Model
{
    protected $fillable = ['name','image'];

    public function getImageUrlAttribute()
    {
        return Storage::url('upload/slider/'.$this->image);
    }

    public function getImageSmUrlAttribute()
    {
        return Storage::url('upload/slider/thumb/'.$this->image);
    }
}
