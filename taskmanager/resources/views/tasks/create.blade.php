@extends('layouts.app')

@section('content')
    <h2 style="font-family:'Fraunces',serif; font-weight:600; font-size:22px; margin-bottom:20px;">Add task</h2>

    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf

        <label>Task name</label>
        <input type="text" name="task_name" value="{{ old('task_name') }}" required autofocus>

        <label>Description</label>
        <textarea name="description" rows="3">{{ old('description') }}</textarea>

        <label>Status</label>
        <select name="status">
            <option value="Pending">Pending</option>
            <option value="Completed">Completed</option>
        </select>

        <label>Due date</label>
        <input type="date" name="due_date" value="{{ old('due_date') }}">

        <div style="display:flex; gap:10px; margin-top:8px;">
            <button type="submit" class="btn btn-add">Save task</button>
            <a href="{{ route('tasks.index') }}" class="btn btn-ghost">Cancel</a>
        </div>
    </form>

    @if ($errors->any())
        <ul style="color: var(--clay); font-size: 14px; margin-top: 20px;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
@endsection