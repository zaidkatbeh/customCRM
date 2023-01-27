<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class task extends Model
{
    use HasFactory,SoftDeletes;
    public $fillable=[
        'name',
        'project_id',
    ];
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
