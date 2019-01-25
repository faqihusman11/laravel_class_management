<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{

    public function students()
    {
        return $this->hasMany('App\Student');
    }

    public function teacher()
    {
        return $this->belongsTo('App\Teacher');
    }
}
