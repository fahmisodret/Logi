<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
		'id', 'first_name', 'last_name', 'email', 'phone', 'message', 'is_read', 
    ];
}
