<?php

namespace sdv;

use Illuminate\Database\Eloquent\Model;

class proyecto extends Model
{
    //tabla a la que hace referencia
    protected $table = 'proyectos';
    //Campos asignables masivamente
    protected $fillable = ['nombre', 'fec_creacion', 'fec_termino', 'observaciones', 'user_id'];

    public function actividades()
    {
        return $this->hasManyThrough('sdv\actividad', 'sdv\etapa');
    }

    public function responsables()
    {
        return $this->hasManyThrough('sdv\actividad', 'sdv\etapa')
        ->join('responsables','actividades.id','=','responsables.actividad_id')
        ->join('users','responsables.responsable_id','=','users.id')
        ->select('users.*');
    }

    public function user(){
    	return $this->belongsTo('sdv\User');
    }
    public function estado(){
        return $this->belongsTo('sdv\estado');
    }
    public function etapas()
    {
        return $this->hasMany('sdv\etapa');
    }
    public function respuestas()
    {
        return $this->hasMany('sdv\userRespuesta')->where('nivel', 1);
    }
    public function respuestasAsc()
    {
        return $this->hasMany('sdv\userRespuesta')->where('nivel', 2)->where('evaluador_id', \Auth::user()->id);
    }
    public function etapasPendientes()
    {
        $cantidad = $this->etapas->where('estado_id', 1)->count();
        return $cantidad;
    }
}
