<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'phone', 'email', 'role', 'status', 'password', 'status_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function menus()
    {
        return $this->hasMany('App\UserMenu', 'user_id')->with('menu');
    }

    public function hasMenu($menu){
        if (is_string($menu) || is_numeric($menu)) {
            return $this->roles->contains('id', $menu);
        }

        if (is_array($menu)) {
            foreach ($menu as $r) {
                if ($this->hasMenu($r)) {
                    return true;
                }
            }

            return false;
        }

        return false;
    }
}
