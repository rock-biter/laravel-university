<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{

    public const AVAILABLE_CFU = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 20, 25, 30];

    protected $fillable = [
        'name', 'description', 'year', 'period', 'website', 'cfu', 'degree_id'
    ];

    public function degree()
    {
        return $this->belongsTo('App\Degree');
    }

    public function teachers()
    {
        return $this->belongsToMany('App\Teacher');
    }
}
