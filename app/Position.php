<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
	protected $table = 'position';
	protected $fillable = ['id', 'name', 'sort_order', 'parent_id'];

	public function staffs() 
	{
	   return $this->belongsToMany('App\Staff','department_position_staff' ,'position_id', 'staff_id' );
	}
	
}
