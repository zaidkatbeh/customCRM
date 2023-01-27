@extends('layouts.customlayout')
@section('useractive')
    (corrent)
@endsection
@section('content')
<div class="container-sm" style="text-align: center;background-color:white;width:45%;border-radius:20px">
    <h1>User Account</h1>
    <br><br>
    <form method="POST" action="{{route('users').'/'.$user->id.'/update'}}">
        <div class="form-group row">
          <label for="UserName" class="col-sm-2 col-form-label">User Name</label>
            <div class="col-sm-10">
                <input type="text" name="name" class="form-control" id="UserName" aria-describedby="UserNameHelp" placeholder="Enter Name" value="{{$user->name}}">
            </div>
        <br><br><br>
        <div class="form-group row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
              <div class="col-sm-10">
                  <input type="password" name="password" class="form-control" id="inputPassword" aria-describedby="passwordHelp" placeholder="********">
              </div>
          </div>
          @csrf
          <br><br><br>
          <div class="col-12 ">
            <button type="submit" class="btn btn-primary btn-lg">Update User Data</button>
          </div>
      </form>
        <br><br><br>
        <div class="col-12 ">
            <form action="{{route('users').'/'.$user->id.'/delete'}}" method="post">
              @csrf
              <input type="submit" value="Delete the User" class="btn btn-danger btn-lg">
            </form>
        </div>
      <br><br><br>
      @foreach ($errors->all() as $error)
      <div class="alert alert-warning" role="alert">
        {{$error}}
      </div>
      @endforeach
</div>
@endsection