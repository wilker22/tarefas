<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodosController extends Controller
{
    public function index()
    {
        return view('todos.index')->with('todos', Todo::all());
    }

    public function show(Todo $todo)
    {
        return view('todos.show')->with('todo', $todo);
    }

    public function create()
    {
        return view('todos.create');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|min:3|max:12',
            'description' => 'required',
        ]);

        $data = request()->all();

        $todo = new Todo();
        $todo->name = $data['name'];
        $todo->description = $data['description'];
        $todo->completed = false;

        $todo->save();

        session()->flash('success', 'Tarefa criada com sucesso.');

        return redirect()->route('todos');
    }

    public function edit(Todo $todo)
    {
        return view('todos.edit')->with('todo', $todo);
    }

    public function update(Todo $todo)
    {
        $validate = request()->validate([
            'name' => 'required|min:3|max:12',
            'description' => 'required',
        ]);

        $data = request()->all();

        $todo->name = $data['name'];
        $todo->description = $data['description'];

        $todo->save();

        session()->flash('success', 'Tarefa alterada com sucesso.');

        return redirect()->route('todos');
    }


    public function destroy(Todo $todo)
    {

        $todo->delete();

        session()->flash('success', 'Tarefa removida com sucesso!');

        return redirect()->route('todos');
    }

    public function complete(Todo $todo)
    {
        $todo->completed = true;

        $todo->save();

        session()->flash('success', 'Tarefa concluída com sucesso!');

        return redirect()->route('todos');
    }

    public function redo(Todo $todo)
    {
        if ($todo->completed = true) {
            $todo->completed = false;
        }

        $todo->save();

        session()->flash('success', 'Tarefa retomada com sucesso!');

        return redirect()->route('todos');
    }
}
