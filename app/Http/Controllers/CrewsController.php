<?php

namespace App\Http\Controllers;

use App\Crew;
use App\Http\Requests\CrewSaveRequest;
use Illuminate\Http\Request;

class CrewsController extends Controller
{


    public function __construct()
    {

        $this->middleware('auth');

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Crew $crew)
    {

        $crews = Crew::latest()->get();
        return view('crews', compact('crews'));

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CrewSaveRequest $request)
    {

        $crew = Crew::create([
            'name'     => $request['name'],
            'persons'  => $request['persons'],
            'type'     => $request['type']
        ]);

        if($crew){

            session()->flash('message', 'Crews has been created');
            return redirect()->back();

        }

        return redirect()->back()->withErrors([
            'message' => 'Please check your credentials'
        ]);


    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
