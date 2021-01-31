<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log_otp extends Model
{
    protected $table = "log_otp";

    public function user_otp()
    {
        return $this->belongsTo('App\User_otp');
    }
}
