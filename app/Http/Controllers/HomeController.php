<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\task;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::user()->role==2)
        {
            $users=User::where('role','0')->count();
            $clients=User::where('role','1')->count();
            $projects=Project::count();
            $tasks=task::count();
            return view('home')
            ->with('usersnumber',$users)
            ->with('clientsnumber',$clients)
            ->with('projectsnumber',$projects)
            ->with('tasksnumber',$tasks);
        }
        else if (Auth::user()->role==1)
        {
            $projects=Project::where('client_id',Auth::user()->id)->get();
            return view('projects.clientprojectview')->with('projects',$projects);
        }
    }
}
