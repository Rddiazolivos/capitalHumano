<?php

namespace sdv;

use Illuminate\Database\Eloquent\Model;

class comentario extends Model
{
    //
    protected $table = 'comentarios';
    protected $fillable = ['nombre', 'actividad_id'];
    public function actividad(){
    	return $this->belongsTo('sdv\coomentario');
    }
}
