@extends('layouts.customlayout')

@section('projectactive')
    (corrent)
@endsection
@section('content')
<div class="container" style="text-align: center;background-color:white;border-radius:20px;padding-bottom: 67px;">
 <h1 >all Projects</h1>
 <br><br>
 <table class="table">
    <thead>
      <tr>
        <th scope="col">Project Id</th>
        <th scope="col">Project Name</th>
        <th scope="col">Project Client</th>
        <th scope="col">Show Details</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($projects as $project)
            
      <tr>
        <th scope="row">{{$project->id}}</th>
        <td>{{$project->name}}</td>
        <td>{{$project->client->name}}</td>
        <td><a href="{{route('projects')."/".$project->id}}"><button type="button" class="btn btn-primary">Show Details</button></a></td>
      </tr>
      @endforeach
    </tbody>
  </table>
  <div>
    @if (isset($projects[0]))
        {{$projects->links()}}
        @else 
        <div class="alert alert-warning" role="alert">
            there is no clients in the DB
          </div>
    @endif

  </div>
  <a href="{{URL('/projects/add')}}"><button class="btn btn-primary">Add A Project</button></a>
</div>
@endsection
