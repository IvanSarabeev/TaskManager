@extends('layouts/layout')
@section('content')

<section class="h-screen w-full py-10 max-w-7xl mx-auto">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div>
  @endif
  @if(session()->get('error'))
    <div class="alert alert-danger">
      {{ session()->get('error') }}
    </div>
  @endif
  <span class="w-full h-fit gap-y-4 flex flex-col md:flex-row items-center justify-between mb-10 px-2.5">
    <div class="gap-y-2 flex flex-col items-start justify-start text-gray-900">
      <h4 class="font-bold text-xl lg:text-2xl">Task Manager System</h4>
      <p class="font-normal text-base">A list of all tasks in your account including title,description, due date and status</p>
    </div>
      <a href="{{ route('tasks.create')}}" class="text-white w-full md:w-fit bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-1 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2.5 text-center">
        Add task
      </a>
  </span>
    <article class="flex items-center justify-center overflow-x-auto shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
      <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50/5 text-left font-semibold text-sm text-gray-900">
          <tr>
            <th class="hidden lg:table-cell py-3.5 pl-4 pr-3">№</th>
            <th class="py-3.5 pl-4 pr-3">Title</th>
            <th class="hidden lg:table-cell py-3.5 pl-4 pr-3  truncate">Description</th>
            <th class="hidden sm:table-cell py-3.5 pl-4 pr-3 ">Due Date</th>
            <th class="hidden md:table-cell py-3.5 pl-4 pr-3 ">Status</th>
            <th class="hidden sm:table-cell py-3.5 pl-4 pr-3 ">Priority</th>
            @if (Auth::user()->isAdmin==1)
              <th class="py-3.5 pl-6 pr-3 " colspan="2">Action</th>
            @endif
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-200 bg-white">
          @foreach($task as $tasks)
          <tr>
            <td class="hidden lg:table-cell whitespace-nowrap py-4 pl-2 pr-3 text-sm text-gray-700 sm:pl-6">
              {{$tasks->id}}
            </td>
            <td class="w-full max-w-0 sm:w-auto sm:max-w-none whitespace-nowrap px-3 py-4 text-sm font-medium text-gray-900">
              {{$tasks->title}}
              <dl class="lg:hidden font-normal">
                <dt class="sr-only sm:hidden">Date</dt>
                <dd class="sm:hidden text-gray-700 mt-1">{{$tasks->due_date}}</dd>
                <dt class="sr-only">Description</dt>
                <dd class="text-gray-500 sm:text-gray-700 mt-1 truncate">{{$tasks->description}}</dd>
                <dt class="sr-only">Status</dt>
                <dd class="text-gray-500 sm:text-gray-700 mt-1 truncate">{{$tasks->status}}</dd>
                <dt class="sr-only sm:hidden">Priority</dt>
                <dd class="sm:hidden text-gray-500 sm:text-gray-700 mt-1 truncate capitalize">{{$tasks->priority}}</dd>
              </dl>
            </td>
            <td class="hidden lg:table-cell whitespace-nowrap px-3 py-4 text-sm text-gray-500 truncate">
              {{$tasks->description}}
            </td>
            <td class="hidden sm:table-cell lg:max-w-sm whitespace-nowrap px-3 py-4 text-sm text-gray-500 truncate">
              {{$tasks->due_date}}
            </td>
            <td class="hidden md:table-cell lg:max-w-sm whitespace-nowrap px-3 py-4 text-sm text-gray-500 truncate">
              {{$tasks->status ? "Completed": "Pending"}}
            </td>
            <td class="hidden sm:table-cell lg:max-w-sm whitespace-nowrap px-3 py-4 text-sm text-gray-900 truncate capitalize">
              {{$tasks->priority}}
            </td>
            <td class="max-w-fit">
              @if(Auth::user()->isAdmin==1)
                <a href="{{ route('tasks.edit', $tasks->id)}}" target="_parent" class="text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-1 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center">Edit</a>
              @endif
            </td>
            <td class="max-w-fit">
              @if(Auth::user()->isAdmin==1)
              <form action="{{ route('tasks.destroy', $tasks->id)}}" method="post" 
                onsubmit="return confirm('Are you sure ? The record will be deleted.');">
                @csrf
                @method('DELETE')                
                <button type="submit" class="text-white bg-gradient-to-br from-rose-500 to-80% to-violet-400 hover:bg-gradient-to-bl focus:ring-1 focus:outline-none focus:ring-pink-200 font-medium rounded-lg text-sm px-4 py-2.5 text-center">
                  Delete
                </button>
                </form>
                @endif
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        <div class="flex items-center justify-center mx-auto">
          {{ $task->links() }}
        </div>
      </article>
    </section>

@endsection