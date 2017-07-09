<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{

    public function crew()
    {

        return $this->belongsTo(Crew::class);

    }

    public function type()
    {

        return $this->hasOne(Type::class);

    }

}
