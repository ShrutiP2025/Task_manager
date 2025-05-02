@extends('layouts.app')

@section('title', 'Edit Task')

@section('content')
    <h1 class="mb-4">Edit Task</h1>
    
    <form method="POST" action="{{ route('tasks.update', $task->id) }}">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $task->title }}" required>
        </div>
        
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3">{{ $task->description }}</textarea>
        </div>
        
        <div class="mb-3 form-check">
    <input type="hidden" name="completed" value="0">
    <input type="checkbox" class="form-check-input" id="completed" name="completed" value="1"
           {{ $task->completed ? 'checked' : '' }}>
    <label class="form-check-label" for="completed">Completed</label>
</div>
        
        <button type="submit" class="btn btn-primary">Update Task</button>
        <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection