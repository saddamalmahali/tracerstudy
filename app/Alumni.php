<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Alumni extends Authenticatable
{
    use Notifiable;

    protected $table = 'alumni';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function status($email)
    {
        $tracer = Tracer::select('email')->where('email', '=',$email)->first();
        if($tracer != null){
            return "Sudah Mengisi";
        }else{
            return "Belum Mengisi";
        }
    }

    public function cek_status($email)
    {
        $tracer = Tracer::select('email')->where('email', '=',$email)->first();
        if($tracer != null){
            return true;
        }else{
            return false;
        }
    }
}
