<?php

namespace sdv;

use Illuminate\Database\Eloquent\Model;

class estado extends Model
{
	protected $table = 'estados';
    public function etapa(){
    	return $this->hasone('sdv\etapa');
    }
}
