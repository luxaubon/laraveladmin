<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pages extends Model
{
    //

    public function images()
    {
    	return $this->hasMany('App\Images','sid');
    }
}
