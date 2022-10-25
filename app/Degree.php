<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Degree extends Model
{

    public function department()
    {
        return $this->belongsTo('App\Department');
    }

    public function courses()
    {
        return $this->hasMany('App\Course');
    }
}
