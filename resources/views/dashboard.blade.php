<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <section class="max-w-7xl h-fit container mx-auto pt-12 pb-8">
        <div class="h-auto mx-auto flex flex-col gap-y-6 items-start justify-start sm:px-6 md:px-10 lg:px-14 xl:px-16 2xl:px-20 rounded-lg shadow-md bg-white text-gray-900">
            <h1 class="font-semibold text-3xl pt-8 mb-4">First 10 Records</h1>
            <table class="min-w-full divide-y divide-gray-200 overflow-x-auto shadow-md">
                <thead class="text-base text-left font-semibold text-gray-900 bg-gray-50/5">
                    <tr>
                        <th class="py-3.5 pl-4 pr-3">№</th>
                        <th class="py-3.5 pl-4 pr-3">Title</th>
                        <th class="py-3.5 pl-4 pr-3">Description</th> 
                        <th class="py-3.5 pl-4 pr-3">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 bg-white">
                    @foreach($tasks as $task)
                    <tr>
                      <td class="hidden lg:table-cell whitespace-nowrap py-4 pl-2 pr-3 text-sm text-gray-700 sm:pl-6">
                        {{$task->id}}
                      </td>
                      <td class="w-full max-w-0 sm:w-auto sm:max-w-none whitespace-nowrap px-3 py-4 text-sm font-medium text-gray-900">
                        {{$task->title}}
                        <dl class="lg:hidden font-normal">
                          <dt class="sr-only sm:hidden">Date</dt>
                          <dd class="sm:hidden text-gray-700 mt-1">{{$task->due_date}}</dd>
                          <dt class="sr-only">Description</dt>
                          <dd class="text-gray-500 sm:text-gray-700 mt-1 truncate">{{$task->description}}</dd>
                          <dt class="sr-only">Status</dt>
                          <dd class="text-gray-500 sm:text-gray-700 mt-1 truncate">{{$task->status}}</dd>
                          <dt class="sr-only sm:hidden">Priority</dt>
                          <dd class="sm:hidden text-gray-500 sm:text-gray-700 mt-1 truncate capitalize">{{$task->priority}}</dd>
                        </dl>
                      </td>
                      <td class="hidden lg:table-cell whitespace-nowrap px-3 py-4 text-sm text-gray-500 truncate">
                        {{$task->description}}
                      </td>
                      <td class="hidden md:table-cell lg:max-w-sm whitespace-nowrap px-3 py-4 text-sm text-gray-500 truncate">
                        {{$task->status ? "Completed": "Pending"}}
                      </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mb-4">
                <a href="/tasks" class="text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-1 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Task App &rarr;</a>
            </div>
        </div>
    </section>
</x-app-layout>
