<?php

namespace sdv;

use Illuminate\Database\Eloquent\Model;

class actividad extends Model
{
    protected $table = 'actividades';
    protected $fillable = ['nombre', 'descripcion', 'fec_entrega', 'observaciones', 'prioridad_id', 'tipo_id', 'estado_id', 'etapa_id'];
    public function prioridad(){
    	return $this->belongsTo('sdv\prioridad');
    }
    public function tipo(){
    	return $this->belongsTo('sdv\tipo_tarea');
    }
    public function estado(){
    	return $this->belongsTo('sdv\estado');
    }
    public function comentario()
    {
        return $this->hasMany('sdv\comentario');
    }

    public function scopeNombre($query, $nombre){
        $query->where('nombre','like', "%$nombre%" );

    }
    public function scopeEstado($query, $estado_id){
        if($estado_id==null){
            $query->where('estado_id', "1" );
        }else{
            $query->where('estado_id', "$estado_id" );
        }
    }
}
