@extends('layouts.app')
@section('content')
    @if (session('status_success'))
        <div class="alert alert-success" role="alert">{{ session('status_success') }}</div>
    @endif
    @if (session('status_error'))
        <div class="alert alert-danger" role="alert">{{ session('status_error') }}</div>
    @endif

    <h2>{{ $employee['employee_name'] }} {{ $employee['employee_surname'] }} update</h2>

    <div class="w-50">
        <form action="{{ route('employees.update', $employee['id']) }}" method="POST">
            @method('PUT') @csrf
            <div class="form-group">
                <input class="form-control" type="text" name="employee_name" value="{{ $employee['employee_name'] }}">
            </div>
            <div class="form-group">
                <input class="form-control" type="text" name="employee_surname"
                    value="{{ $employee['employee_surname'] }}">
            </div>
            <div class="form-group">
                <select class="form-control" name="project_id" id="project_id">
                    <option value="">--- None ---</option>
                    @foreach (App\Models\Project::all() as $project)
                        <option value="{{ $project['id'] }}"
                            {{ $employee['project_id'] == $project['id'] ? 'selected' : '' }}>
                            {{ $project['project_name'] }}</option>
                    @endforeach
                </select>
            </div>
            <input class="btn btn-primary" type="submit" value="UPDATE">
            <input class="btn btn-secondary text-uppercase" type="reset" value="Reset form">
        </form>
    </div>
@endsection
