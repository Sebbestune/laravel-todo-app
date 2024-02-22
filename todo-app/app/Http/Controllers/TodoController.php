<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     return view('todolist.index');
    // }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $todolistid)
    {
        return view('todo.edit', ['todolistid' => $todolistid]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $todolistid)
    {
        $todo = new Todo;
        $todo->title = $request->title;
        $todo->description = $request->description;
        $todo->done = $request->done;
        $todo->todo_list_id = $todolistid;
        $todo->save();

        return redirect()->route('todolist.show', ['id' => $todolistid]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $todolistid, string $id)
    {
        if (Todo::where('id', $id)->exists()) {
            $todos = Todo::where('id', $id)->get();
            return view(
                'todo.edit',
                [
                    'todo' => $todos[0],
                    'todolistid' => $todolistid
                ],
            );
        }
        return redirect()->route('todolist.show', ['id' => $todolistid]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $todolistid, string $id)
    {
        if (Todo::where('id', $id)->exists()) {
            $todo = Todo::find($id);
            $todo->title = is_null($request->title) ? $todo->title : $request->title;
            $todo->description = is_null($request->description) ? $todo->description : $request->description;
            $todo->done = is_null($request->done) ? $todo->done : $request->done;
            $todo->save();
        }
        return redirect()->route('todolist.show', ['id' => $todolistid]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateDone(Request $request, string $todolistid, string $id)
    {
        if (Todo::where('id', $id)->exists()) {
            $todo = Todo::find($id);
            $todo->done = abs($todo->done -1);
            $todo->save();
        }
        return redirect()->route('todolist.show', ['id' => $todolistid]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $todolistid, string $id)
    {
        if (Todo::where('id', $id)->exists()) {
            $todo = Todo::find($id);
            $todo->delete();
        }
        return redirect()->route('todolist.show', ['id' => $todolistid]);

    }
}
