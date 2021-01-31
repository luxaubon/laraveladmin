<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_otp extends Model
{
    protected $table = "user_otp";

    public function Logotp()
    {
        return $this->hasOne('App\Log_otp');
    }
}
