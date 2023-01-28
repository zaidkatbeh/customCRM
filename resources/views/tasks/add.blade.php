@extends('layouts.customlayout')

@section('taskactive')
    (corrent)
@endsection
@section('content')

<div class="container-sm" style="text-align: center;background-color:white;width:45%;border-radius:20px;padding-bottom:65px;min-width: fit-content;">
 <h1>Add A Task</h1>
 <form action="{{URL('tasks/store')}}" method="POST">
    <div class="form-group row">
        <label for="name" class="col-sm-2 col-form-label">Task Name </label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="name" id="name" aria-describedby="ProjectNameHelp" placeholder="Enter task name">
        </div>
    </div>
    <br>
    <div class="form-group row">
        <label for="project" class="col-sm-2 col-form-label">Project Name </label>
        <div class="col-sm-10">
            <select class="form-select" aria-label="Default select example" name="project" id="project">
                @foreach ($projects as $project)
                    <option value="{{$project->id}}">{{$project->name}}</option>
                @endforeach
              </select>        
        </div>
    </div>
    
         
    <br><br>
    @csrf
    <div class="col-12 ">
        <button type="submit" class="btn btn-primary btn-lg" style="margin-bottom: 30px">save project</button>
      </div>
 </form>
 @foreach ($errors->all() as $error)
 <div class="alert alert-warning" role="alert">
   {{$error}}
 </div>
 @endforeach
</div>

@endsection