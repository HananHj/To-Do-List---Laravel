<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Task;


class ToDoController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    public function deleteTask($id){
        $Task = Task::find($id); 
        $Task->delete(); 
        return redirect('todo');
        }

    public function readTask(Request $request){
    $userid = $request->user()->id; // get current user id 
    $tasks = Task::where('userId', $userid)->get(); 
    return view('todo', ['Task' => $tasks]); 
}




public function addTask(Request $request ){
    $userid = $request->user()->id; 
    $Task = Task::create([
        'title' => $request->title,
        'description' => $request->description, 
        'userId' => $userid 
    ]);
    $Task->save();
    return redirect('todo');
}


public function editTask($id){
            $Task = Task::find($id); 
            return view('edit',['Task'=>$Task]);
            }

            
            public function updateTask(Request $request){
                $Task = Task::where('id',$request->id) -> update([ 
                'title'=>$request->title,
                'description'=>$request->description
            ]);
            return redirect('todo');

}
}


