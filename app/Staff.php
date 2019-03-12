<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Staff extends Authenticatable
{   
	protected $table = 'staff';
	protected $fillable = [
        'name', 'email', 'password', 	
    ];
	public function positions()
	{
    	return $this->belongsToMany('App\Position','department_position_staff' ,'staff_id', 'position_id' );
	}
	public function departments()
	{
		return $this->belongsToMany('App\Department' ,'department_position_staff', 'staff_id', 'department_id');
	}
}
