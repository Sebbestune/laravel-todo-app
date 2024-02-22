<?php

namespace App\Http\Controllers;

use App\Models\TodoList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodoListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard');
    }

    /**
     * Show the specified resource.
     */
    public function show(string $id)
    {
        if (TodoList::where('id', $id)->exists()) {
            $todolist = TodoList::where('id', $id)->get();

            return view('todolist.index', ['todolist' => $todolist[0]]);
        }
        return view('dashboard');
    }

        /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('todolist.edit');
    }

        /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $todolist = new TodoList;
        $todolist->title = $request->title;
        $todolist->description = $request->description;
        $todolist->user_id = Auth::id();
        $todolist->save();

        return view('dashboard');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (TodoList::where('id', $id)->exists()) {
            $todolists = TodoList::where('id', $id)->get();
            return view(
                'todolist.edit',
                [
                    'todolist' => $todolists[0]
                ],
            );
        }
        return view('dashboard');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (TodoList::where('id', $id)->exists()) {
            $todolist = TodoList::find($id);
            $todolist->title = is_null($request->title) ? $todolist->title : $request->title;
            $todolist->description = is_null($request->description) ? $todolist->description : $request->description;
            $todolist->save();
        }
        return view('dashboard');
    }

        /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (TodoList::where('id', $id)->exists()) {
            $todo = TodoList::find($id);
            $todo->delete();
        }
        return view('dashboard');

    }

}
