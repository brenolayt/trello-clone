<?php

namespace App\Http\Controllers;

use App\Models\todo;
use Illuminate\Http\Request;
use App\Models\todoCard;

class todoController extends Controller
{
    public function show()
    {
        return view('/todo');
    }

    public function create(Request $request)
    {
        $input = $request->validate([
            'title' => ['required', 'max:28']
        ]);

        $userId = auth()->user()->id;

        todo::create([
            'title' => $input['title'],
            'user_id' => $userId,
        ]);

        return redirect()->route('todo.show');
    }

    public function delete(todo $todo){
        if(auth()->user()->id != $todo->user_id){
            abort(403);
        }

        $todo->delete();
        return redirect()->route('todo.show');
    }

    public function createCard(Request $request, $todoId){
        $input = $request->validate([
            'title' => ['required', 'max:30']
        ]);

        todoCard::create([
            "todo_id" => $todoId,
            "user_id" => auth()->user()->id,
            "text" => $input['title'],
        ]);

        return redirect()->route('todo.show');
    }

    public function cardDelete(todoCard $todoCard){
        if(auth()->user()->id != $todoCard->user_id){
            abort(403);
        }

        $todoCard->delete();
        return redirect()->route('todo.show');
    }
}
