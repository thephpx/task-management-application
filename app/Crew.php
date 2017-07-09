<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Crew extends Model
{


    public function tasks()
    {

        return $this->hasMany(Task::class);

    }

    public function user()
    {

        return $this->belongsTo(User::class);

    }
}
