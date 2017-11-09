<?php

namespace sdv;

use Illuminate\Database\Eloquent\Model;

class etapa extends Model
{
    protected $table = 'etapas';
    protected $fillable = ['nombre', 'proyecto_id', 'fec_creacion', 'fec_termino', 'observaciones'];

    public function proyecto(){
    	return $this->belongsTo('sdv\proyecto');
    }
    public function estado(){
    	return $this->belongsTo('sdv\estado');
    }
}
