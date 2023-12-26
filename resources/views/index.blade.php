@extends('layouts/layout')
@section('content')

<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  @if(session()->get('error'))
    <div class="alert alert-danger">
      {{ session()->get('error') }}
    </div><br />
  @endif
<a href="{{ route('tasks.create')}}" class="btn btn-success">
    <i class="bi bi-folder-plus"></i> ADD</a>
    <div class="float-end">
      {{ Auth::user()->name }}    
      <a href="{{ route('logout') }}" class="btn btn-dark" onclick="event.preventDefault();
       document.getElementById('logout-form').submit();">    
        {{ __('Logout') }}    
      </a>    
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">    
        @csrf    
      </form>    
    </div>
  <table class="table table-striped">
    <thead>
        <tr>
          <td>№</td>
          <td>Title</td>
          <td>Description</td>
          <td>Due Date</td>
          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($task as $tasks)
        <tr>
            <td>{{$tasks->id}}</td>
            <td>{{$tasks->title}}</td>
            <td>{{$tasks->description}}</td>
            <td>{{$tasks->due_date}}</td>
            <td>
              @if(Auth::user()->isAdmin==1)
                <a href="{{ route('tasks.edit', $tasks->id)}}" class="btn btn-primary">
                  <i class="bi bi-pencil-square"></i> Edit
                </a>
               @endif
              </td>
            <td>
              @if(Auth::user()->isAdmin==1)
                <form action="{{ route('tasks.destroy', $tasks->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit"><i class="bi bi-x-circle"></i> Delete</button>
                </form>
              @endif
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>

@endsection