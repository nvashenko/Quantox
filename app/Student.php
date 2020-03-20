<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public $timestamps = false;

    /**
     * Get the comments for the blog post.
     */
    public function grades()
    {
        return $this->hasMany('App\Grade');
    }

    /**
     * Get the comments for the blog post.
     */
    public function board()
    {

        return $this->belongsTo('App\Board');
    }
}
