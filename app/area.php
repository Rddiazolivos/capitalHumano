<?php

namespace sdv;

use Illuminate\Database\Eloquent\Model;

class area extends Model
{
    protected $table = 'areas';

    public function pregunta()
    {
        return $this->hasMany('sdv\pregunta');
    }
}
