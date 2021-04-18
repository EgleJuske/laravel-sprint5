@extends('layouts.app')
@section('content')
    <h2>Projects</h2>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Project name</th>
                <th scope="col">Assigned employees</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)
                <tr>
                    <th scope="row">{{ $project['id'] }}</th>
                    <td>
                        {{ $project['project_name'] }}
                    </td>
                    <td>
                        @foreach ($project->employees as $employee)
                            {{ $employee['employee_name'] }}{{ $loop->last ? '' : ', ' }}
                        @endforeach
                    </td>
                    <td>
                        @if (auth()->check())
                            <div class="d-flex">
                                <form action="{{ route('projects.show', $project['id']) }}" method="GET">
                                    <input class="btn btn-primary btn-sm mr-3" type="submit" value="UPDATE">
                                </form>
                                <form action="{{ route('projects.destroy', $project['id']) }}" method="POST">
                                    @method('DELETE') @csrf
                                    <input class="btn btn-danger btn-sm" type="submit" value="DELETE">
                                </form>
                            </div>
                        @else
                            <div>You need to <a href="{{ route('login') }}">{{ __('Login') }}</a> to see
                                actions
                            </div>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @if (auth()->check())
        @if (session('status_success'))
            <div class="alert alert-success" role="alert">{{ session('status_success') }}</div>
        @endif
        @if (session('status_error'))
            <div class="alert alert-danger" role="alert">{{ session('status_error') }}</div>
        @endif

        <div class="w-50 mt-5">
            <h3>Add new project</h3>
            <form method="POST" action="/projects">
                @csrf
                <div class="form-group">
                    <label for="project_name">Project name:</label>
                    <input class="form-control" type="text" id="project_name" name="project_name">
                    @error('project_name')
                        <div class="alert alert-danger" role="alert">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="project_info">Project info:</label>
                    <input class="form-control" type="text" id="project_info" name="project_info">
                    @error('project_info')
                        <div class="alert alert-danger" role="alert">{{ $message }}</div>
                    @enderror
                </div>
                <input class="btn btn-primary text-uppercase mr-3" type="submit" value="Submit">
                <input class="btn btn-secondary text-uppercase" type="reset" value="Reset form">
            </form>
        </div>
    @endif

@endsection
