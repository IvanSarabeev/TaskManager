@extends('layouts/layout')
@section('content')

<div class="card uper">
  <div class="card-header">
    Add Task
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
      <form method="post" action="{{ route('tasks.store') }}">
          <div class="form-group">
              @csrf
              <label for="title">Task Title:</label>
              <input type="text" class="form-control" name="title"/>
          </div>
          <div class="form-group">
              <label for="description">Description:</label>
              <input type="text" class="form-control" name="description"/>
          </div>
          <div class="form-group">
            <label for="due_date">Due Date:</label>
            <input type="date" placeholder="YYYY-MM-DD" id="due_date" name="due_date" required>
          </div>
          <button type="submit" class="btn btn-primary"> <i class="bi bi-folder-plus"></i> Add Task</button>
      </form>
  </div>
</div>

@endsection