@extends('layouts/layout')
@section('content')

<div class="card uper">

  <div class="card-header">

    Add Student Data

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

              <label for="fn">FN:</label>

              <input type="text" class="form-control" name="fn"/>

          </div>

          <div class="form-group">

              <label for="name">Student Name:</label>

              <input type="text" class="form-control" name="name"/>

          </div>

          <button type="submit" class="btn btn-primary"> <i class="bi bi-folder-plus"></i> Add Student</button>

      </form>

  </div>

</div>

@endsection