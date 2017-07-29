<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class AlumniTracer extends Model
{
    use Notifiable;

    protected $table = 'tracer_alumni';

}
