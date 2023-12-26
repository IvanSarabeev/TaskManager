@extends('layouts/layout')
@section('content')


<div class="card uper">
  <div class="card-header">
    Edit Tasks Data
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('tasks.update', $task->id) }}">
          <div class="form-group">
              @csrf
              @method('PATCH')
              <label for="title">Title:</label>
              <input type="text" class="form-control" name="title" value="{{ $task->title }}"/>
          </div>
          <div class="form-group">
              <label for="description">Description:</label>
              <input type="text" class="form-control" name="description" value="{{ $task->descriptionn }}"/>
          </div>
          <div class="form-group">
              <label for="due_date">Due Data:</label>
              <input type="text" class="form-control" name="due_date" value="{{ $task->due_date }}"/>
          </div>
          <button type="submit" class="btn btn-primary">Update Data</button>
      </form>
  </div>
</div>

@endsection

