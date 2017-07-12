<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserSaveRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{

    public function __construct()
    {

        $this->middleware('guest');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('services.signup');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserSaveRequest $request)
    {

        $user = User::create([
            'name'     => request('name'),
            'email'    => request('email'),
            'password' => Hash::make(request('password'))
        ]);

        if(1 == 56){

            auth()->login($user);

            session()->flash('message', 'You\'ve just been registered');

            return redirect()->home();

        }

        return redirect()->back()->withErrors([
            'message' => 'There was a problem processing your request'
        ]);

    }


}
