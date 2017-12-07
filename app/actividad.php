<?php

namespace sdv;

use Illuminate\Database\Eloquent\Model;

class actividad extends Model
{
    protected $table = 'actividades';
    protected $fillable = ['nombre', 'descripcion', 'fec_entrega', 'observaciones', 'prioridad_id', 'estado_id', 'etapa_id'];

    public function etapa(){
        return $this->belongsTo('sdv\etapa');
    }
    
    public function prioridad(){
    	return $this->belongsTo('sdv\prioridad');
    }    
    public function estado(){
    	return $this->belongsTo('sdv\estado');
    }
    public function comentario()
    {
        return $this->hasMany('sdv\comentario');
    }
    public function responsables()
    {
        return $this->hasMany('sdv\responsable');
    }
    public function evaluacion(){
        return $this->hasOne('sdv\evaluacion');
    }

    public function scopeNombre($query, $nombre){
        $query->where('nombre','like', "%$nombre%" );

    }
    public function scopeProyecto($query, $pro_id){
        if($pro_id == null || $pro_id == "all"){

        }else{
            $query->whereHas('etapa.proyecto', function($q) use ($pro_id) {
                return $q->where('id', $pro_id);
            });
        }
        
    }
    public function scopeEstado($query, $estado_id){
        if($estado_id==null){
            $query->where('estado_id', "1" );
        }else{
            $query->where('estado_id', "$estado_id" );
        }
    }
    public function scopeEstadoAll($query, $estado_id){        
        if($estado_id==null || $estado_id==10){
            //no se agreg nada
        }else{
            $query->where('estado_id', "$estado_id" );
        }      
    }
}
