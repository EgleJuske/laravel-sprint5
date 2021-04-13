<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{

    public function index()
    {
        return view('projects', ['projects' => Project::all()]);
    }

    public function show($id)
    {
        return view('project', ['project' => Project::find($id)]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'project_name' => 'required|unique:projects,project_name|max:30',
            'project_info' => 'required|max:255',
        ]);

        $pr = new Project();
        $pr->project_name = $request['project_name'];
        $pr->project_info = $request['project_info'];

        if ($pr->project_name == NULL or $pr->project_info == NULL)
            return redirect('/projects')->with('status_error', 'Project was not created!');

        return ($pr->save() !== 1) ?
            redirect('/projects')->with('status_success', 'Project created!') :
            redirect('/projects')->with('status_error', 'Project was not created!');
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'project_name' => 'required|unique:projects,project_name,' . $id . ',id|max:30',
            'project_info' => 'required|max:255',
        ]);

        $pr = Project::find($id);
        $pr->project_name = $request['project_name'];
        $pr->project_info = $request['project_info'];
        return ($pr->save() !== 1) ?
            redirect('/projects/' . $id)->with('status_success', 'Project updated!') :
            redirect('/projects/' . $id)->with('status_error', 'Project was not updated!');
    }


    public function destroy($id)
    {
        Project::destroy($id);
        return redirect('/projects')->with('status_success', 'Post deleted!');
    }
}
