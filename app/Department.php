<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{

    protected $fillable = [
        'name',
        'website',
        'email',
        'head_of_department',
        'address',
        'phone'
    ];
}
