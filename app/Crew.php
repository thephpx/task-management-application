<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Crew extends Model
{

    protected $fillable = ['name', 'persons', 'type'];
    protected $guarded  = ['id'];
    protected $hidden   = ['created_at', 'updated_at'];


    public function tasks()
    {

        return $this->hasMany(Task::class);

    }

    public function user()
    {

        return $this->belongsTo(User::class);

    }
}
