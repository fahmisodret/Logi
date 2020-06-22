<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserMenu extends Model
{
    protected $fillable = ['user_id','menu_id'];

    public function user(){
    	return $this->belongsTo('App\User', 'user_id');
    }

    public function menu(){
    	return $this->belongsTo('App\Menu', 'menu_id');
    }
}
