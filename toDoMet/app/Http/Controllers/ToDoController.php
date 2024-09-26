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
    $userid = $request->user()->id; // Get the current user ID
    $tasks = Task::where('userId', $userid)->get(); // Fetch tasks for the specific user
    return view('todo', ['Task' => $tasks]); // Pass the tasks to the view
}




public function addTask(Request $request ){
    $userid = $request->user()->id; // get current user id 
    $Task = Task::create([
        'title' => $request->title,
        'description' => $request->description, 
        'userId' => $userid 
    ]);
    $Task->save();
    return redirect('todo');
}


public function editTask($id){
            $Task = Task::find($id); # serach tha record that has the same id that i sent it when deleting comma here mean =
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


