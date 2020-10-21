<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Auth\Events\Validated;

class ManageTaskController extends Controller
{
    //
    public function showData(){

        $result = Task::all();

        ///I want to filter the data if got 1
        ///No need to show...

        $data = [];

        foreach($result as $item){

            if($item->done != 1){

                array_push($data, $item);

            }
        }

        return View('Index', ['data' => $data]);
        
    }

    public function insertTask(Request $req){

        $req->validate([
            //unique:tasks how make filed unique
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
            //unique:tasks how make filed unique
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
        $Task->done = 1;
        $Task->save();

        return redirect('/');

    }

}
