<?php

namespace App\Http\Controllers;

use App\Crew;
use App\Http\Requests\CrewSaveRequest;
use App\Task;
use App\Types;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mockery\Matcher\Type;

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


    // saves a crew in the database
    public function store(CrewSaveRequest $request)
    {

        $crew = Crew::create([
            'name'     => $request['name'],
            'user_id'  => auth()->user()->id,
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


    // shows a particular crew
    public function show(Crew $crew)
    {
        $tasks = DB::table('tasks')
            ->select(DB::raw('*, tasks.id as task_id'))
            ->leftJoin('types', 'tasks.type_id', '=', 'types.id')
            ->where('crew_id', $crew->id)
            ->orderBy('completed', 'asc')
            ->get();

        foreach($tasks as $task){
            $start = new Carbon($task->start);
            $finish = new Carbon($task->finish);
            $task->start = $start->toFormattedDateString();;
            $task->finish = $finish->diffInDays($start->copy());
        }

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
