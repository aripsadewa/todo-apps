<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Str;
use Inertia\Inertia;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::with('user:id,name')->with('categories:slug,name')->get();

        return Inertia::render('Todo/Index', compact('todos'));
    }

    public function create()
    {
        $categories = Category::orderBy('name', 'asc')->get();
        return Inertia::render('Todo/Create', compact('categories'));
    }

    public function store(Request $request)
    {
        $todo = Todo::create([
            'title' => $request->title,
            'slug' => \Str::slug($request->title),
            'body' => $request->body,
            'user_id' => $request->user()->id,
        ]);
        $todo->categories()->attach($request->category_ids);

        return redirect()->route('todos');
    }

    public function edit(Todo $todo)
    {
        $categories = Category::orderBy('name', 'asc')->get();
        return Inertia::render('Todo/Edit', [
            'todo' => $todo,
            'categories' => $categories,
        ]);
    }

    public function update(Request $request, Todo $todo)
    {
        $todo->update([
            'title' => $request->title,
            'body' => $request->body,
            'user_id' => $request->user()->id,
        ]);
        $todo->categories()->sync($request->category_ids);

        return redirect()->route('todos');
    }

    public function destroy(Todo $todo)
    {
        $todo->categories()->detach($todo->category_ids);
        $todo->delete();

        return redirect()->route('todos');
    }
}
