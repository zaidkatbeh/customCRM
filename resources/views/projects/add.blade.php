@extends('layouts.customlayout')

@section('projectactive')
    (corrent)
@endsection
@section('content')

<div class="container-sm" style="text-align: center;background-color:white;width:45%;border-radius:20px;padding-bottom:65px;min-width: fit-content;">
 <h1>add a project</h1>
 <form action="{{URL('projects/store')}}" method="POST">
    <div class="form-group row">
        <label for="name" class="col-sm-2 col-form-label">Project Name </label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="name" id="name" aria-describedby="ProjectNameHelp" placeholder="Enter project name">
        </div>
    </div>
    <br>
    <div class="form-group row">
        <label for="client" class="col-sm-2 col-form-label">client Name </label>
        <div class="col-sm-10">
            <select class="form-select" aria-label="Default select example" name="client" id="client">
               @foreach ($clients as $client)
                    <option value="{{$client->id}}">{{$client->name}}</option>
               @endforeach
              </select>        
        </div>
    </div>
    <br><label for="">users :</label>
    @foreach ($users as $user)
        
        <div class="form-check form-check-inline">
            <input class="form-check-input" name="users[]" type="checkbox" id="inlineCheckbox{{$user->id}}" value="{{$user->id}}">
            <label class="form-check-label" for="inlineCheckbox{{$user->id}}">{{$user->name}}</label>
          </div>
          @endforeach
         
    <br><br>
    @csrf
    <div class="col-12 ">
        <button type="submit" class="btn btn-primary btn-lg">save project</button>
      </div>
 </form>
 @foreach ($errors->all() as $error)
 <div class="alert alert-warning" role="alert">
   {{$error}}
 </div>
 @endforeach
</div>

@endsection