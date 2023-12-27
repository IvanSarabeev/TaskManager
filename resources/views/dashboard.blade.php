<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <section class="max-w-7xl h-fit container mx-auto pt-12 pb-8">
        <div class="h-auto mx-auto sm:px-6 md:px-10 lg:px-14 xl:px-16 2xl:px-20 rounded-lg shadow-md bg-white text-gray-900">
            <h1 class="font-semibold text-3xl pt-8 mb-4">Last 10 Records</h1>
            <table class="w-full h-fit table table-striped">
                <thead class="text-xl font-bold">
                    <tr>
                        <td>№</td>
                        <td>Title</td>
                        <td>Description</td> 
                        <td>Due Data</td>
                    </tr>
                </thead>
                <tbody class="text-base font-normal">
                    <tr>
                        <td>№</td>
                        <td>Title</td>
                        <td>Description</td> 
                        <td>Due Data</td>
                    </tr>
                    {{-- @foreach($tasks as $task)
                        <tr class="text-white">
                            <td>{{$task->id}}</td>
                            <td>{{$task->title}}</td>
                            <td>{{$task->description}}</td>
                            <td>{{$task->due_date}}</td>
                        </tr>
                    @endforeach --}}
                </tbody>
            </table>
            <button type="button" class="text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-1 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Task App &rarr;</button>
        </div>
    </section>
</x-app-layout>
