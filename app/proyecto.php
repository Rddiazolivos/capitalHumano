<?php

namespace sdv;

use Illuminate\Database\Eloquent\Model;

class proyecto extends Model
{
    //tabla a la que hace referencia
    protected $table = 'proyectos';
    //Campos asignables masivamente
    protected $fillable = ['nombre', 'fec_creacion', 'fec_termino', 'observaciones', 'user_id'];

    public function user(){
    	return $this->belongsTo('sdv\User');
    }
}
