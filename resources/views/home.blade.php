@extends('layouts.app')
@section('content')
    <h1>Project manager</h1>

    @if (!auth()->check())
        <div>You need to Login to use this project manager. If you don't
            login, you can only view project table with assiged employees and employees table.
        </div>

        <div class="mt-3">
            <a class="btn btn-outline-success px-5 mr-3" href="{{ route('login') }}">{{ __('Login') }}</a>
            <a class="btn btn-outline-primary px-5" href="{{ route('register') }}">{{ __('Register') }}</a>
        </div>
    @endif

    <div class="mt-3">This project manager allows users to do these following actions:</div>
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
