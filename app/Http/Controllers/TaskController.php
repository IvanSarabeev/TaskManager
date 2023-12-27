<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $priority = $request->input('priority');

        $task = Task::when($priority, function ($query, $priority) {
            return $query->where('priority', $priority);
        })
        ->paginate(5);

        $tasksQuery = Task::query();

        if ($request->has('priority')) {
            $tasksQuery->where('priority', $request->input('priority'));
        }

        // $task = Task::paginate(15);
        return view('index', compact('task'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate(Task::rules());
        $task = Task::create($validatedData);
        return redirect('/tasks')->with('success', 'You have successfully added data!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // User Auth
        if(auth()->user()->isAdmin != 1){
            return redirect('/tasks')->with('error', 'You are not admin!');
        }

        $task = Task::findOrFail($id);
        return view('edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if(auth()->user()->isAdmin != 1){
            return redirect('/tasks')->with('error', 'You are not admin!');
        }

        $validatedData = $request->validate(Task::rules());
        Task::whereId($id)->update($validatedData);
        return redirect('/tasks')->with('success', 'Task data is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if(auth()->user()->isAdmin != 1){
            return redirect('/tasks')->with('error', 'You are not admin!');
        }

        $task = Task::findOrFail($id);
        $task->delete();
        return redirect('/tasks')->with('success', 'The data has been successfully deleted');
    }
}
