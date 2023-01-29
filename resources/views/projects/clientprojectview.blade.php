@extends('layouts.customlayout')

@section('home')
    (corrent)
@endsection
@section('content')
<div class="container" style="background-color:white;border-radius:20px;padding-bottom: 67px;padding-top:50px">
    <h1 style="text-align: center;margin-bottom:94px">this is the home page</h1>
    <br><br>
    <table class="table" style="text-align: center">
       <thead>
         <tr>
           <th scope="col">project ID</th>
           <th scope="col">project Name</th>
         </tr>
       </thead>
       <tbody>
        @foreach ($projects as $project)
        <tr>
          <td scope="row">{{$project->id}}</td>
          <td>{{$project->name}}</td>
        </tr>
        @endforeach
       </tbody>
     </table>
  
</div>
@endsection
