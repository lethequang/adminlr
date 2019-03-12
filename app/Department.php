<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = 'department';
    protected $fillable = ['name', 'order'];

    public function staffs()
	{
		return $this->belongsToMany('App\Staff' ,'department_positon_staff', 'department_id', 'staff_id');
		
	}


}
