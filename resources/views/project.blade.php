@extends('layouts.app')
@section('content')
    @if (session('status_success'))
        <div class="alert alert-success" role="alert">{{ session('status_success') }}</div>
    @endif
    @if (session('status_error'))
        <div class="alert alert-danger" role="alert">{{ session('status_error') }}</div>
    @endif

    <h2>{{ $project['project_name'] }} update</h2>

    <div class="w-50">
        <form action="{{ route('projects.update', $project['id']) }}" method="POST">
            <div class="form-group">
                @method('PUT') @csrf
                <input class="form-control" type="text" name="project_name" value="{{ $project['project_name'] }}">
                @error('project_name')
                    <div class="alert alert-danger" role="alert">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <textarea style="height: 90px; min-height: 30px; max-height: 100px;" class="form-control" type="text"
                    name="project_info">{{ $project['project_info'] }}</textarea>
                @error('project_info')
                    <div class="alert alert-danger" role="alert">{{ $message }}</div>
                @enderror
            </div>
            <input class="btn btn-primary" type="submit" value="UPDATE">
            <input class="btn btn-secondary text-uppercase" type="reset" value="Reset form">
        </form>

    </div>
@endsection
