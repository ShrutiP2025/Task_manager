@extends('layouts.app')

@section('title', 'Task Details')

@section('content')
<div class="container py-4">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2 class="mb-0">Task Details</h2>
            <span class="status-badge {{ $task->completed ? 'badge-completed' : 'badge-pending' }}">
                {{ $task->completed ? 'Completed' : 'Pending' }}
            </span>
        </div>
        <div class="card-body">
            <h3 class="card-title text-primary">{{ $task->title }}</h3>
            <p class="card-text mt-4">{{ $task->description }}</p>
            
            <div class="mt-4 pt-3 border-top">
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Created:</strong> {{ $task->created_at->format('M d, Y h:i A') }}</p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Last Updated:</strong> {{ $task->updated_at->diffForHumans() }}</p>
                    </div>
                </div>
            </div>
            
            <div class="d-flex justify-content-end mt-4">
                <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-primary me-2">
                    <i class="fas fa-edit me-1"></i> Edit Task
                </a>
                <a href="{{ route('tasks.index') }}" class="btn btn-outline-primary">
                    <i class="fas fa-arrow-left me-1"></i> Back to List
                </a>
            </div>
        </div>
    </div>
</div>
@endsection