@extends('layouts.app')
@section('content')
  <div class="container">

 
    <!--  {{ $todos }} -->
  <div class="row">
    <div class="col-md-5 mt-3 list-group">

      

    
      </div>

      <div class="col-md-12">
        <div class="card card-default">
        <div class="card-header">
        Todos
        <a href="/create" style="float:right;" class="mr-2 btn btn-success">Create</a>
      </div>
        <div class="card-body">
      <!-- Message about added Todo -->
      @if(session()->has('success'))
      <li class="alert alert-success">
        {{ session()->get('success') }}
      </li>
      @endif
      @if(session()->has('deleted'))
      <li class="alert alert-danger">
        {{ session()->get('deleted') }}
      </li>
      @endif
     <!--  Completed and uncompleted -->
      @if(session()->has('completed'))
      <li class="alert alert-success">
        {{ session()->get('completed') }}
      </li>
      @endif
      @if(session()->has('uncomplete'))
      <li class="alert alert-success">
        {{ session()->get('uncomplete') }}
      </li>
      @endif
      <!--  Completed and uncompleted -->
            <ul class="list-group">
               @foreach($todos as $todo)
              <h4>{{ $todo->name }}</h4>
                <li class="list-group-item"> 
                {{ $todo->description }}
                @if(!$todo->completed)
                <a href="/todos/{{ $todo->id }}/complete" style="float:right;" class="mr-2 btn btn-warning">Complete</a>
                @else
                <a href="/todos/{{ $todo->id }}/uncomplete" style="float:right;" class="mr-2 btn btn-info">Uncomplete</a>
                @endif
                <a href="{{ $todo->id }}" style="float:right; " class="btn btn-primary mr-2">Edit</a>
                <a href="{{ $todo->id }}/delete" style="float:right;" class="btn btn-danger mr-2">Delete</a>

                </li> 
                @endforeach
            </ul> 
        </div>
      </div>
    </div>

    </div>
@endsection