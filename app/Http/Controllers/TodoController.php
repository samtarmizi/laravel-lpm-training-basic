<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }



    public function index()
    {
        // query list of todos from db
        // $todos = Todo::paginate(3);
        $user = auth()->user();

        $todos = $user->todos()->paginate(3);

        // return to view - resources/views/todos/index.blade.php
        return view('todos.index', compact('todos'));
    }

    public function create()
    {
        // show create form
        return view('todos.create');
    }

    public function store(Request $request)
    {
        // store to todos table using model
        $todo = new Todo();
        $todo->title = $request->title;
        $todo->description = $request->description;
        $todo->user_id = auth()->user()->id;
        $todo->save();

        // return todos index
        return redirect()->to('/todos')->with([
            'type' => 'alert-primary',
            'message' => 'Successfuly store your todo!'
        ]);

    }

    public function show(Todo $todo)
    {
        return view('todos.show', compact('todo'));
    }

    public function edit(Todo $todo)
    {
        return view('todos.edit', compact('todo'));
    }

    public function update(Todo $todo, Request $request)
    {
        $todo->title = $request->title;
        $todo->description = $request->description;
        $todo->save();

        return redirect()->to('/todos')->with([
            'type' => 'alert-success',
            'message' => 'Successfuly update your todo!'
        ]);
    }

    public function delete(Todo $todo)
    {
        // delete from table using model
        $todo->delete();

        // return to todos index
        return redirect()->to('/todos')->with([
            'type' => 'alert-danger',
            'message' => 'Successfuly delete your todo!'
        ]);
    }
}
