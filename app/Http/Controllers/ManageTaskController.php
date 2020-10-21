<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\DoneTask;
use Illuminate\Auth\Events\Validated;

class ManageTaskController extends Controller
{
    //
    public function showData(){

        $data = Task::all();

        return View('Index', ['data' => $data]);
        
    }

    public function insertTask(Request $req){

        $req->validate([
            //unique:tasks make field unique
            'tasks' => 'required|max:255|unique:tasks'
        ]);

        $req->task;
        
        $Task = new Task;
        $Task->tasks = $req->tasks;
        $Task->done = 0;
        $Task->save();

        return redirect('/')->with('success', 'Data Inserted Successful.');

        
    }

    public function getTask($id){

        $Task = Task::find($id);

        return view('Update', ['task' => $Task]);
        
    }

    public function updateTask(Request $req){

        $req->validate([
            //unique:tasks make field unique
            'tasks' => 'required|max:255|unique:tasks'
        ]);
    
        $req->input('tasks');
        $req->input('id');

        $Task = Task::find($req->input('id'));
        $Task->tasks = $req->tasks;
        $Task->save();

        return redirect('/')->with('update', 'Data Updated Successful.');

    }

    public function deleteTask($id){

        $Task = Task::find($id);
        $Task->delete();

        return back()->with('deleted', 'Task Deleted.');

    }

    public function doneTask($id){


        $Task = Task::find($id);

        //Created a new DB for keeping 
        //the done data
         
        $DoneTask = new DoneTask;
        $DoneTask->tasks = $Task->tasks;
        $DoneTask->done = 1;
        $DoneTask->taskCreated = $Task->created_at;
        $DoneTask->save();

        $DoneTask->save();

        if($DoneTask->save() == 1){

            $Task->delete($id);
            return back();

        }else{
            return back();
        }

    }

}
