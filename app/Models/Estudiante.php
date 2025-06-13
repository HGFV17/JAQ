<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    protected $table = 'estudiantes'; 
    public $timestamps = false;
    public function ppff(){
        return $this->belongsTo(Ppff::class);
    }

    public function usuario(){
        return $this->belongsTo(User::class);
    }

    public function matriculaciones(){
        return $this->hasMany(Matriculacion::class);
    }
}
