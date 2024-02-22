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
}
