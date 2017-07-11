<?php

namespace App\Http\Controllers;

use App\Http\Requests\TypeSaveRequest;
use Illuminate\Http\Request;
use App\Types;

class TypesController extends Controller
{


    public function store(TypeSaveRequest $request)
    {
        $type = new Types;

        $type->name = $request->name;

        if($type->save()){
            session()->flash('message', "Type {$type->name} was successfully created");
        } else {
            session()->flash('message', "There was an error saving this type");
        }

        return back();

    }
}
