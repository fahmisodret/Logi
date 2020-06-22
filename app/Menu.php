<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = ['name','plural', 'parent_id'];

    public function children() {
    	return $this->hasMany('App\Menu','parent_id');
	}
	public function parent() {
	    return $this->belongsTo('App\Menu','parent_id');
	}
}
