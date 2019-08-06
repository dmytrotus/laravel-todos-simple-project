<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Todos;

class TodosController extends Controller
{
    public function index(){       ///show all todos
    	return view('index')
        ->with('todos', Todos::all());
    }

    public function edit($id, Todos $todo){           ///show one todo with $id
    	
        $todo = Todos::find($id);

        return view('edit')
        ->with('todo', $todo);
    }

    public function complete($id){

        $todo = Todos::find($id);

        $todo->completed = true;

        $todo->save();

        session()->flash('completed', 'Todo is Completed');

        return back();
    }

    public function uncomplete($id){

        $todo = Todos::find($id);

        $todo->completed = false;

        $todo->save();

        session()->flash('completed', 'Todo is Uncompleted');

        return back();
    }

    public function create(){       ///create form for todo
    	return view('create');
    }

    public function store(Request $request, Todos $todo){       ///storing the todo
    	
        $this->validate(request(), [                            //check the inputs
            'name' => 'required',
            'description' => 'required'
        ]);

        $todo = Todos::create([
            'name' => $request->name,
            'description' => $request->description,
            'completed' => false
        ]);

        session()->flash('completed', 'Todo Stored');

        return redirect('/');
    }

    public function update(Request $request, $id){      ///updating the todo
    	
        $todo = Todos::find($id);

        $todo->name = $request->name;
        $todo->description = $request->description;

        $todo->save();

        session()->flash('completed', 'Todo Updated');

        return redirect('/');

    }

    public function destroy($id){       ///to destroy the todo
    	
        $todo = Todos::find($id);

        $todo->delete();

        session()->flash('deleted', 'Todo is deleted');
        
        return redirect('/');
    }
}
