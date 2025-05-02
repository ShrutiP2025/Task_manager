@extends('layouts.app')

@section('title', 'Create New Task')

@section('content')
<div class="container py-4">
    <div class="card">
        <div class="card-header">
            <h2 class="mb-0">Create New Task</h2>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('tasks.store') }}">
                @csrf
                
                <div class="mb-3">
                    <label for="title" class="form-label">Task Title</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                </div>
                
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                </div>
                
                <div class="d-flex justify-content-end">
                    <a href="{{ route('tasks.index') }}" class="btn btn-outline-secondary me-2">
                        <i class="fas fa-times me-1"></i> Cancel
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-1"></i> Save Task
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection