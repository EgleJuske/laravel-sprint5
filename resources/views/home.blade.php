@extends('layouts.app')
@section('content')
    <h1>Project manager</h1>
    <div>Welcome to this project manager which was built with php Laravel framework</div>
    <div class="font-weight-bold mt-3">Employees page:
    </div>
    <ul>
        <li>Add new employee</li>
        <li>Assign project to employee</li>
        <li>Delete employee</li>
        <li>Update employee name, surname, assigned project</li>
    </ul>

    <div class="font-weight-bold mt-3">Projects page:
    </div>
    <ul>
        <li>Add new project</li>
        <li>Delete project (only if no employees are assigned to the project)</li>
        <li>Update project title and info</li>
    </ul>
@endsection
