@extends('layouts.customlayout')

@section('useractive')
    (corrent)
@endsection
@section('content')
<div class="container" style="text-align: center;background-color:white;border-radius:20px;padding-bottom: 67px;">
 <h1 >all users</h1>
 <br><br>
 <table class="table">
    <thead>
      <tr>
        <th scope="col">User Id</th>
        <th scope="col">User Name</th>
        <th scope="col">User Email</th>
        <th scope="col">Show Details</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            
      <tr>
        <th scope="row">{{$user->id}}</th>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        <td><a href="{{route('users')."/".$user->id}}"><button type="button" class="btn btn-primary">Show Details</button></a></td>
      </tr>
      @endforeach
    </tbody>
  </table>
  <div>
    
    @if (isset($users[0]))
    {{$users->links()}}
    @else 
    <div class="alert alert-warning" role="alert">
        there is no users in the DB
      </div>
@endif
  </div>
</div>
@endsection
