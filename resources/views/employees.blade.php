@extends('layouts.app')
@section('content')
    <h2>Employees</h2>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Employee name</th>
                <th scope="col">Project</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employees as $employee)
                <tr>
                    <th scope="row">{{ $employee['id'] }}</th>
                    <td>
                        {{ $employee['employee_name'] }} {{ $employee['employee_surname'] }}
                    </td>
                    <td>
                        {{ $employee->project['project_name'] }}
                    </td>
                    <td>
                        {{-- Hide button if the user is not logged in --}}
                        @if (auth()->check())
                            <div class="d-flex">
                                <form action="{{ route('employees.show', $employee['id']) }}" method="GET">
                                    <input class="btn btn-primary btn-sm mr-3" type="submit" value="UPDATE">
                                </form>
                                <form action="{{ route('employees.destroy', $employee['id']) }}" method="POST">
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
            <h3>Add new employee</h3>
            <form method="POST" action="/employees">
                @csrf
                <div class="form-group">
                    <label for="employee_name">Employee name:</label>
                    <input class="form-control" type="text" id="employee_name" name="employee_name">
                    @error('employee_name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="employee_surname">Employee surname:</label>
                    <input class="form-control" type="text" id="employee_surname" name="employee_surname">
                    @error('employee_surname')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="project_id">Project:</label>
                    <select class="form-control" name="project_id" id="project_id">
                        <option value="" selected>--- None ---</option>
                        @foreach (App\Models\Project::all() as $project)
                            <option value="{{ $project['id'] }}">{{ $project['project_name'] }}</option>
                        @endforeach
                    </select>
                    @error('project_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <input class="btn btn-primary text-uppercase mr-3" type="submit" value="Submit">
                <input class="btn btn-secondary text-uppercase" type="reset" value="Reset form">
            </form>
        </div>
    @endif

@endsection
