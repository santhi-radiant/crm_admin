<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Project;
use App\Models\ProjectTask;
use App\Models\Task;
use App\Models\Taskable;
use App\Models\User;


use Illuminate\Http\Request;

class TasksController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$tasks=Task::with('projects')->get();
        $tasks=Task::paginate(10);

       // $projects=Project::where('id',$projects->user_id)->get();
       // $assigned_user=User::where('id',)->get();
        //$assigned_client=Client::where('id',$tasks->projects->client_id)->get();
        return view('tasks',['tasks'=>$tasks,]);

       // return view('tasks',compact('tasks','assigned_user','assigned_client'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projects=Project::all();
        //$clients=Client::where('id',$projects->client_id);
        return view('create_tasks',compact(['projects']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $task= new Task();
        $task->title=$request->input('title');
        $task->description=$request->input('description');
        $task->status=$request->input('status');
        $task->save();

        $taskable= new Taskable();
        $taskable->project_id=$request->input('assigned_project');
        $taskable->task_id=$task->id;
        $taskable->save();

        return redirect()->route('tasks')->with('success', 'Task Successfully Created !!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $task=Task::with('projects')->where('id',$id)->first();
        return view('edit_task', compact(['task']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {


        $task=Task::where('id',$id)->first();
        $task->title=$request->input('title');
        $task->description=$request->input('description');
        $task->status=$request->input('status');
        $task->save();

        $taskable=Taskable::where('task_id',$id)->first();
        $taskable->project_id=$request->input('assigned_project');
        $taskable->task_id=$id;
        $taskable->save();

        return redirect()->route('tasks')->with('success', 'Task Successfully Updated !!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Task::where('id',$id)->delete();
        return redirect()->route('tasks')->with('success', 'Task Successfully Deleted !!');
    }
}
