<?php

namespace sdv;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre', 'email', 'password', 'ape_paterno', 'ape_materno', 'rut', 'fec_nacimiento', 'fec_ingreso', 'sexo', 'departamento_id', 'rol_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function proyecto(){
        return $this->hasMany('sdv\proyecto');
    }
    public function rol(){
        return $this->belongsTo('sdv\rol');
    }
    public function departamento(){
        return $this->belongsTo('sdv\departamento');
    }
}

