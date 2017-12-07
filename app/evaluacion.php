<?php

namespace sdv;

use Illuminate\Database\Eloquent\Model;

class evaluacion extends Model
{
    protected $table = 'evaluacion';

    //protected $fillable = ['conforme', 'calificacion', 'observacion', 'actividad_id', 'id'];

    public function actividad()
    {
        return $this->belongsTo('sdv\actividad');
    }
}
