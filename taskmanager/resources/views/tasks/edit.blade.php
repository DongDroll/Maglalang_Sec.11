@extends('layouts.app')

@section('content')
    <h2 style="font-family:'Fraunces',serif; font-weight:600; font-size:22px; margin-bottom:20px;">Edit task</h2>

    <form action="{{ route('tasks.update', $task->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Task name</label>
        <input type="text" name="task_name" value="{{ old('task_name', $task->task_name) }}" required autofocus>

        <label>Description</label>
        <textarea name="description" rows="3">{{ old('description', $task->description) }}</textarea>

        <label>Status</label>
        <select name="status">
            <option value="Pending" {{ $task->status == 'Pending' ? 'selected' : '' }}>Pending</option>
            <option value="Completed" {{ $task->status == 'Completed' ? 'selected' : '' }}>Completed</option>
        </select>

        <label>Due date</label>
        <input type="date" name="due_date" value="{{ old('due_date', $task->due_date) }}">

        <div style="display:flex; gap:10px; margin-top:8px;">
            <button type="submit" class="btn btn-add">Update task</button>
            <a href="{{ route('tasks.index') }}" class="btn btn-ghost">Cancel</a>
        </div>
    </form>
@endsection