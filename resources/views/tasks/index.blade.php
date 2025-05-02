@extends('layouts.app')

@section('title', 'Task Dashboard')

@section('content')
<div class="container py-4">
    <!-- Clean header with Task Manager and Create Task button -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="text-primary mb-0">Task Manager</h1>  <!-- Simple heading -->
        <a href="{{ route('tasks.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i>Create Task
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="row">
        @foreach($tasks as $task)
        <div class="col-md-6 col-lg-4">
            <div class="card task-card {{ $task->completed ? 'completed-task' : '' }}">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">{{ $task->title }}</h5>
                    <span class="status-badge {{ $task->completed ? 'badge-completed' : 'badge-pending' }}">
                        {{ $task->completed ? 'Completed' : 'Pending' }}
                    </span>
                </div>
                <div class="card-body">
                    <p class="card-text">{{ Str::limit($task->description, 100) }}</p>
                    <div class="d-flex justify-content-between">
                        <small class="text-muted">
                            Updated: {{ $task->updated_at->diffForHumans() }}
                        </small>
                        <div class="btn-group">
                            <a href="{{ route('tasks.show', $task->id) }}" class="btn btn-sm btn-outline-primary">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-sm btn-outline-primary">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection