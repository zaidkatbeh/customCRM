@extends('layouts.customlayout')

@section('taskactive')
    (corrent)
@endsection
@section('content')
<div class="container" style="text-align: center;background-color:white;border-radius:20px;padding-bottom: 67px;min-width: fit-content;">
 <h1 >all tasks</h1>
 <br><br>
 <table class="table">
    <thead>
      <tr>
        <th scope="col">tasks Id</th>
        <th scope="col">tasks Name</th>
        <th scope="col">project name</th>
        <th scope="col">Show Details</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($tasks as $task)
            
      <tr>
        <th scope="row">{{$task->id}}</th>
        <td>{{$task->name}}</td>
        <td>{{$task->project->name}}</td>
        <td><a href="{{route('tasks')."/".$task->id}}"><button type="button" class="btn btn-primary">Show Details</button></a></td>
      </tr>
      @endforeach
    </tbody>
  </table>
  <div>
    @if (isset($tasks[0]))
        {{$tasks->links()}}
        @else 
        <div class="alert alert-warning" role="alert">
            there is no clients in the DB
          </div>
    @endif

  </div>
  <a href="{{URL('/tasks/add')}}"><button class="btn btn-primary">Add A tasks</button></a>
</div>
@endsection
