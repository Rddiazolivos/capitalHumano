<?php

namespace sdv;

use Illuminate\Database\Eloquent\Model;

class responsable extends Model
{
    public function usuario(){
        return $this->belongsTo('sdv\User');
    }
}
