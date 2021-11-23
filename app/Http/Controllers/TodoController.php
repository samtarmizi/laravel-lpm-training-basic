<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    public function index()
    {
        // query list of todos from db
        $todos = Todo::all();

        // return to view - resources/views/todos/index.blade.php
        return view('todos.index', compact('todos'));
    }

    public function create()
    {
        // show create form
        return view('todos.create');
    }
}
