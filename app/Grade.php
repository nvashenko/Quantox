<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    protected $fillable = ['grade'];

    public $timestamps = false;

    public function student() {
        return $this->belongsTo('App/Student');
    }
}
