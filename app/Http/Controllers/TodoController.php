<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{

    protected $task;

    public function __construct()
    {
        $this->task = new Todo();
    }
    public function index()
    {
        $response['tasks'] = $this->task->all();
        return view('pages.pages.todo.index')->with($response);
    }

    public function store(Request $request)
    {
       // dd($request);

       $this->task->create($request->all());

       //$this->task->title = $request->title;
       //$this->task->save();

       //return redirect()->back();
       return redirect()->route('home');
    }

    public function delete($task_id)
    {
        //dd($task_id);
        $task =$this ->task->find($task_id);
        $task->delete();

        return redirect()->back();
    }

    public function done($task_id)
    {
        //dd($task_id);
        $task =$this ->task->find($task_id);
        $task-> done =1;
        $task -> update();

        return redirect()->back();
    }
}
