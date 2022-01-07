<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ToDoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function getAll()
    {
        $todos = Todo::all();

        return response()->json(["todos" => $todos]);
    }

    public function create(Request $request)
    {
        $todo = new Todo;
        $todo->task_name = $request->input('task_name');
        $todo->save();

        return response()->json(["todo" => $todo]);
    }

    public function update(Request $request)
    {
        $todo = Todo::where('id', $request->input('id'))->first();
        $todo->completed = !$todo->completed;
        $todo->save();

        return response()->json(["todo" => $todo]);
    }
}
