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
           <th scope="col"></th>
           <th scope="col"></th>
           <th scope="col"></th>
         </tr>
       </thead>
       <tbody>

               
         <tr>
           <th scope="row">users number</th>
           <td>{{$usersnumber}}</td>
           <td><a href="{{route('users')}}"><button class="btn btn-primary">view all</button></a></td>
         </tr>
         <tr>
            <th scope="row">client number</th>
            <td>{{$clientsnumber}}</td>
            <td><a href="{{route('clients')}}"><button class="btn btn-primary">view all</button></a></td>
        </tr>
        <tr>
            <th scope="row">projects number</th>
            <td>{{$projectsnumber}}</td>
            <td><a href="{{route('projects')}}"><button class="btn btn-primary">view all</button></a></td>
        </tr>
        <tr>
            <th scope="row">tasks number</th>
            <td>{{$tasksnumber}}</td>
            <td><a href="{{route('tasks')}}"><button class="btn btn-primary">view all</button></a></td>
        </tr>
       </tbody>
     </table>
  
</div>
@endsection
