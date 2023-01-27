<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\task;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified','adminchecker']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users=User::where('role','1')->count();
        $clients=User::where('role','0')->count();
        $projects=Project::count();
        $tasks=task::count();
        return view('home')
        ->with('usersnumber',$users)
        ->with('clientsnumber',$clients)
        ->with('projectsnumber',$projects)
        ->with('tasksnumber',$tasks);
    }
}
