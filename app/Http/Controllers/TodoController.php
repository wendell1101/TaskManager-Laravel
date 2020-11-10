<?php

namespace App\Http\Controllers;

use App\Todo;
use App\Step;
use Illuminate\Http\Request;
use App\Http\Requests\TodoCreateRequest;
use Illuminate\Database\Eloquent\Collection;

class TodoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $todos = auth()->user()->todos->sortBy('completed');
        // $todos = Todo::orderBy('completed')->get();
        return view('todos.index',compact('todos'));
    }
    public function create(){
        return view('todos.create');
    }

    public function show(Todo $todo){
        
        return view('todos.show', compact('todo'));
    }
    public function edit(Todo $todo){
       
        return view('todos.edit',compact('todo'));
    }
    public function store(TodoCreateRequest $request){  
        
        // $userId = auth()->id();
        // $request['user_id'] = $userId;
        $todo = auth()->user()->todos()->create($request->all());
        if($request->step){
            foreach ($request->step as $step){
                Step::create(['name' => $step, 'todo_id' => $todo->id])->where('todo_id', $todo->id);
            }
        }
 
        // Todo::create($request->all());
        return redirect(route('todo.index'))->with('message', 'A task has been created');
    }

    // update
    public function update(TodoCreateRequest $request, Todo $todo){
        
        $todo->update(['title' => $request->title]);
        if($request->stepName){
            foreach($request->stepName as $key => $value){
                $id = $request->stepId[$key];
                if(!$id){
                    Step::create(['name' => $value, 'todo_id' => $todo->id]);
                    // $todo->steps->create(['name' => $value]);
                }else{
                    $step = Step ::find($id);
                    $step->update(['name' => $value]);
                }
               
            }
        }
        
        return redirect(route('todo.index'))->with('message', 'A todo has been updated');
    }

    public function destroy(Todo $todo){
        $todo->delete();
        return redirect()->back()->with('message', 'Todo has been deleted');
    }

    public function complete(Todo $todo){
        $todo->update(['completed' => true]);
        return redirect()->back()->with('message', 'Todo mark as completed');
    }

    public function incomplete(Todo $todo){
        $todo->update(['completed' => false]);
        return redirect()->back()->with('message', 'Todo mark as incomplete');
    }
  
}
