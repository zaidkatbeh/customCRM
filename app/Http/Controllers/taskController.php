<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\task;
use App\Http\Requests\taskinsert;
class taskController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified','adminchecker']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks=task::with('project')->paginate(15);
        return view('tasks.tasks')->with('tasks',$tasks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projects=Project::get();
        return view('tasks.add')->with('projects',$projects);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(taskinsert $request)
    {
        $task=new task;
        $task->name=$request['name'];
        $task->project_id=$request['project'];
        $task->save();
        return redirect('/tasks');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(task $task)
    {
        $projects=Project::get();
        // dd($task->toArray());
        return view('tasks.taskview')->with('task',$task)->with('projects',$projects);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $taskID)
    {
        $task=task::where('id',$taskID)->get()->first();
        $task->name=$request['name'];
        $task->project_id=$request['project'];
        $task->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($taskID)
    {
        $task=task::where('id',$taskID);
        $task->delete();
        return redirect('tasks');
    }
}
