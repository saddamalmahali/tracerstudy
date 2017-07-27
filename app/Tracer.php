<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tracer extends Model
{
    protected $table = 'tracer';

    public function alumni()
    {
        return $this->belongsToMany('App\Alumni', 'tracer_alumni', 'id_tracer', 'id_alumni');
    }

    public function detile()
    {
        return $this->hasMany('App\TracerDetile', 'id_tracer','id');
    }
}
