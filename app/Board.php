<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    public $timestamps = false;

    public function students()
    {

        return $this->hasMany('App\Student');
    }
}
