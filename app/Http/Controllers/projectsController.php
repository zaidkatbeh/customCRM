<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\projectInsert;
use App\Models\User;
use DB;
use App\Models\Project;
class projectsController extends Controller
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
        $projects=Project::with('client')->with('users')->paginate(15);
        // dd($projects->toArray());
        return view('projects.projects')->with('projects',$projects);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients=User::where('role',1)->get();
        $users=User::where('role',0)->get();
        // dd($clients->toArray());
        return view('projects.add')->with('clients',$clients)->with('users',$users);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(projectInsert $request)
    {
        $project=new Project;
        $project->client_id=$request['client'];
        $project->name=$request['name'];
        $project->save();
        $data="INSERT INTO project_users ( project_id, user_id) VALUES";
        foreach($request['users'] as $user)
        $data.="('$project->id','$user'),";
        $data=substr($data, 0, -1);
        DB::statement($data);
        return redirect('/projects');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($projectID)
    {
        $project=Project::where('id',$projectID)->with('client')->with('users')->select('client_id','id','name')->get()->first();
        $clients=User::where('role',1)->get();
        $users=User::where('role',0)->get();
        // dd($project->toArray());
        return view('projects.projectview')->with('project',$project)->with('clients',$clients)->with('users',$users);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(projectInsert $request,$projectID)
    {
        $project=Project::where('id',$projectID)->get()->first();
        // dd($request->toArray());
        $project->client_id=$request['client'];
        $project->name=$request['name'];
        $project->save();
        $delete="DELETE FROM project_users WHERE project_id=$projectID;";
        $insert="INSERT INTO project_users ( project_id, user_id) VALUES";
        foreach($request['users'] as $user)
        $insert.="($project->id,$user),";
        $insert=substr($insert, 0, -1);
        DB::delete($delete);
        DB::insert($insert);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $Project)
    {
        $Project->delete();
        return redirect('/projects');
    }
}
