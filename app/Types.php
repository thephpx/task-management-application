<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Types extends Model
{
    protected $fillable = ['name'];

    public $timestamps = false;

    public function task()
    {

        return $this->belongsTo(Task::class);

    }

}
