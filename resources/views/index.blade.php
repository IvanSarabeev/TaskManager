@extends('layouts/layout')
@section('content')
{{-- Header  --}}
{{-- @include('layouts.navigation') --}}
{{-- Header  --}}

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
      <h4 class="font-semibold text-xl">Task Manager</h4>
      <p class="font-normal text-base">A list of all tasks in your account including title,description, due date and status</p>
    </div>
    <button type="button" class="text-white w-full md:w-fit bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-1 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2.5 text-center">
      <a href="{{ route('tasks.create')}}">
        Add task
      </a>
    </button>
  </span>
    <article class="flex items-center justify-center overflow-x-auto shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
      <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50/5">
          <tr>
            <th class="hidden lg:table-cell py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900">№</th>
            <th class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900">Title</th>
            <th class="hidden lg:table-cell py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 truncate">Description</th>
            <th class="hidden sm:table-cell py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900">Due Date</th>
            @if (Auth::user()->isAdmin==1)
              <th class="py-3.5 pl-6 pr-3 text-left text-sm font-semibold text-gray-900" colspan="2">Action</th>
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
              </dl>
            </td>
            <td class="hidden lg:table-cell whitespace-nowrap px-3 py-4 text-sm text-gray-500 truncate">
              {{$tasks->description}}
            </td>
            <td class="hidden sm:table-cell lg:max-w-sm whitespace-nowrap px-3 py-4 text-sm text-gray-500 truncate">
              {{$tasks->due_date}}
            </td>
            <td>
              @if(Auth::user()->isAdmin==1)
              <button type="button" class="text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-1 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center">
                <a href="{{ route('tasks.edit', $tasks->id)}}">Edit</a>
              </button>
              @endif
            </td>
            <td>
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
      </article>
    </section>

@endsection