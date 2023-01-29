<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\project_user;
class Project extends Model
{
    use HasFactory,SoftDeletes;
    //the attributes that a user can enter
    public $fillable=[
        'project_id',
        'user_id',
    ];

    public function client()
    {
        // $client=App\Models::=User::where('id',$this->client_id)->get();
        // dd($client);
        // dd($this->hasMany(User::class)->toArray());
        return $this->hasOne(User::class,'id','client_id');
    }
   public function users()
   {
    return $this->hasmany(project_user::class,'project_id','id')->select('id','project_id','user_id');
   }
   public function tasks()
   {
    return $this->hasMany(task::class);
   }
}
