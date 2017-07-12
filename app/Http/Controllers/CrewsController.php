<?php

namespace App\Http\Controllers;

use App\Crew;
use App\Http\Requests\CrewSaveRequest;
use App\Task;
use App\Types;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Repositories\TasksRepository;
use App\Repositories\CrewsRepository;

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

        $crews = Crew::all()->where('user_id', auth()->user()->id);
        return view('crews', compact('crews'));

    }


    // saves a crew in the database
    public function store(CrewSaveRequest $request)
    {

        if(CrewsRepository::createCrew($request)){

            session()->flash('message', 'Crew has been created');
            return redirect()->back();

        }

        return redirect()->back()->withErrors([
            'message' => 'Please check your credentials'
        ]);


    }


    // shows a particular crew
    public function show(Crew $crew)
    {
        $tasks = DB::table('tasks')
            ->select(DB::raw('*, tasks.id as task_id'))
            ->leftJoin('types', 'tasks.type_id', '=', 'types.id')
            ->where('crew_id', $crew->id)
            ->orderBy('completed', 'asc')
            ->get();

        $tasks = TasksRepository::combineTaskWithTypes($tasks);

        $types = Types::all();

        return view('crew', compact('crew', 'tasks', 'types'));

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
