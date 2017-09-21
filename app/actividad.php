<?php

namespace sdv;

use Illuminate\Database\Eloquent\Model;

class actividad extends Model
{
    protected $table = 'actividades';
    protected $fillable = ['nombre', 'descripcion', 'fec_entrega', 'observaciones', 'prioridad_id', 'tipo_id', 'estado_id', 'responsable_id', 'etapa_id'];
    public function prioridad(){
    	return $this->belongsTo('sdv\prioridad');
    }
    public function estado(){
    	return $this->belongsTo('sdv\estado');
    }
}
