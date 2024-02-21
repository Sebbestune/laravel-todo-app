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
    public function index()
    {
        return view('dashboard');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('todo.edit');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $todo = new Todo;
        $todo->title = $request->title;
        $todo->description = $request->description;
        $todo->done = $request->done;
        $todo->user_id = Auth::id(); 
        $todo->save();

        return view('dashboard');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('todo.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if(Todo::where('id', $id)->exists()){
            $todo = Todo::find($id);
            $todo->title = is_null($request->title) ? $todo->title : $request->title;
            $todo->description = is_null($request->description) ? $todo->description : $request->description;
            $todo->done = is_null($request->done) ? $todo->done : $request->done;
            $todo->save();
        }
        return view('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
