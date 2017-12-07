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

    public function actividades()
    {
        return $this->hasMany('sdv\actividad');
    }

    public function actividadesPendientes()
    {
        $cantidad = $this->actividades->where('estado_id', 1)->count();
        return $cantidad;
    }

    public function actividadesEvaRealizadas()
    {
        $cantidad = 0;
        $actividades = $this->actividades;
        foreach($actividades as $actividad){
            if($actividad->evaluacion <> null){
                $cantidad = $cantidad + 1;
            }
        }
        return $cantidad;
    }

    public function actividadesEvaPendientes()
    {
        $cantidad = 0;
        $actividades = $this->actividades;
        foreach($actividades as $actividad){
            if($actividad->evaluacion == null){
                $cantidad = $cantidad + 1;
            }
        }
        return $cantidad;
    }
}


