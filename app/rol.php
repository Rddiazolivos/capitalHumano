<?php

namespace sdv;

use Illuminate\Database\Eloquent\Model;

class rol extends Model
{
	protected $table = 'roles';
    public function users()
    {    	
        return $this->hasMany('sdv\User');
    }
}
