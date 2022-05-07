<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class ProjectsController extends Controller
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
        $projects=Project::paginate(10);
        return view('projects',compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users=User::all();
        $clients=Client::all();
        return view('create_projects',compact(['users','clients']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $projects= new Project();
        $projects->title=$request->input('title');
        $projects->description=$request->input('description');
        $projects->deadline=$request->input('deadline');
        $projects->user_id=$request->input('assigned_user');
        $projects->client_id=$request->input('assigned_client');
        $projects->status=$request->input('status');
        $projects->save();
        return redirect()->route('projects')->with('success', 'Project Successfully Created !!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users=User::all();
        $clients=Client::all();
        $project=Project::where('id',$id)->first();
        return view('edit_project', compact(['users','clients','project']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $project=Project::where('id',$id)->first();
        $project->title=$request->input('title');
        $project->description=$request->input('description');
        $project->deadline=$request->input('deadline');
        $project->user_id=$request->input('assigned_user');
        $project->client_id=$request->input('assigned_client');
        $project->status=$request->input('status');
        $project->save();
        return redirect()->route('projects')->with('success', 'Project Successfully Updated !!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Project::where('id',$id)->delete();
        return redirect()->route('projects')->with('success', 'Project Successfully Deleted !!');
    }
}
