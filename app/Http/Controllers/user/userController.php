<?php

namespace App\Http\Controllers\user;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\userupdate;
class userController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified','adminchecker']);
    }
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }
    public function index(Request $Request,)
    {
        $users=User::select('name','email','id')->where('id','!=',Auth::user()->id)->where('role',0)->paginate(15);
        return view('users.users')->with('users',$users);
    }
    public function edit(User $user)
    {
        // dd($user->toArray());
        return view('users.userview')->with('user',$user);
    }

    public function update(userupdate $Request,$userID)
    {
        $user=User::where('id',$userID)->get()->first();
        $user->name=$Request['name'];
        $user->password=Hash::make($Request['password']);
        $user->save();
        return redirect()->back();

    }
    public function destroy($userid)
    {
        $user=User::where('id',$userid)->get()->first();
        $user->delete();
        return redirect('users');
    }
    public function showProfile()
    {
        return view('users.userprofile');
    }
    public function showclientsonly()
    {
        $users=User::where('role',1)->paginate(15);
        // dd($users->toArray());
        return view('users.clients')->with('users',$users);
    }
}
