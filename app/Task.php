<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Mockery\Matcher\Type;

class Task extends Model
{
    public $timestamps = false; // allows to delete timestamps from migration table

    public function crew()
    {

        return $this->belongsTo(Crew::class);

    }

    public function type()
    {

        return $this->hasOne(Type::class);

    }


}
