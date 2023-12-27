@extends('layouts/layout')
@section('content')


<section class="h-screen w-full py-8 max-w-7xl mx-auto px-4 lg:px-0">
  <span class="w-full h-fit flex items-center justify-start mb-6">
    <h4 class="font-bold text-xl lg:text-2xl">
      Current Task:
    </h4>
    <p class="font-semibold text-base">
      "{{$task->title}}"
    </p>
  </span>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div>
    @endif
      <form method="post" action="{{ route('tasks.update', $task->id) }}">
        <article class="max-w-4xl gap-4 grid grid-cols-1">
          @csrf
          <div>
            <label for="title" class="block mb-2 text-sm font-medium text-gray-900">Task Title:</label>
            <input type="text" name="title" class="rounded-none rounded-e-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Name your task">
          </div>
          <div>
            <label for="description">Description:</label>
            <input type="text" name="description" class="rounded-none rounded-e-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Describe what you think">
          </div>
          <div>
            <label for="due_date">Due Date:</label>
            <input type="date" name="due_date" class="rounded-none rounded-e-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
          </div>
        </article>
          <button type="submit" class="text-white mt-4 w-full md:w-fit bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-1 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2.5 text-center">Update</button>
      </form>
  </div>
</section>

@endsection

