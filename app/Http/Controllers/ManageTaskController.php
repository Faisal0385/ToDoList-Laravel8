<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
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
            //unique:tasks how make filed unique
            'task' => 'required|max:255'
        ]);
    

        $req->task;
        
        $Task = new Task;
        $Task->tasks = $req->task;
        $Task->save();

        return redirect('/');

        
    }

    public function getTask($id){

        $Task = Task::find($id);

        return view('Update', ['task' => $Task]);
        
    }

    public function updateTask(Request $req){

        $req->validate([
            //unique:tasks how make filed unique
            'task' => 'required|max:255'
        ]);
    
        $req->input('task');
        $req->input('id');

        $Task = Task::find($req->input('id'));
        $Task->tasks = $req->task;
        $Task->save();

        return redirect('/');

    }

    public function deleteTask($id){

        $Task = Task::find($id);
        $Task->delete();

        return redirect('/');

    }

}
