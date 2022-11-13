<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        return 'Hello world!';
        // to views/tasks/index.blade.php or index.php
        // return view('tasks.index')
        //         ->with('tasks', Task::all());
    }

    // public function create() {
    //     //
    // }

    // public function store() {
    //     Task::create(request()->only(['title', 'description']));

    //     return redirect('tasks');
    // }
}
