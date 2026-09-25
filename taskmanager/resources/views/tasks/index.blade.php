@extends('layouts.app')

@section('content')
    <style>
        .toolbar { display: flex; justify-content: space-between; align-items: center; margin-bottom: 28px; }
        .count { font-size: 14px; color: var(--ink-soft); }

        .task-row {
            display: flex;
            gap: 16px;
            padding: 20px 0;
            border-bottom: 1px solid var(--line);
            align-items: flex-start;
        }
        .task-row:first-of-type { border-top: 1px solid var(--line); }

        .task-main { flex: 1; min-width: 0; }
        .task-name { font-size: 16px; font-weight: 600; margin-bottom: 4px; }
        .task-desc { font-size: 14px; color: var(--ink-soft); margin-bottom: 8px; }
        .task-meta { display: flex; gap: 10px; align-items: center; font-size: 13px; }
        .due { color: var(--ink-soft); }

        .pill {
            display: inline-block;
            padding: 3px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }
        .pill-pending { background: var(--clay-bg); color: var(--clay); }
        .pill-completed { background: var(--sage-bg); color: var(--sage); }

        .task-actions { display: flex; gap: 8px; flex-shrink: 0; }

        .empty {
            padding: 60px 0;
            text-align: center;
            color: var(--ink-soft);
            border-top: 1px solid var(--line);
        }
    </style>

    <div class="toolbar">
        <span class="count">{{ $tasks->count() }} {{ Str::plural('task', $tasks->count()) }}</span>
        <a href="{{ route('tasks.create') }}" class="btn btn-add">Add task</a>
    </div>

    @forelse ($tasks as $task)
        <div class="task-row">
            <div class="task-main">
                <div class="task-name">{{ $task->task_name }}</div>
                @if ($task->description)
                    <div class="task-desc">{{ $task->description }}</div>
                @endif
                <div class="task-meta">
                    <span class="pill pill-{{ strtolower($task->status) }}">{{ $task->status }}</span>
                    @if ($task->due_date)
                        <span class="due">Due {{ \Carbon\Carbon::parse($task->due_date)->format('M j') }}</span>
                    @endif
                </div>
            </div>
            <div class="task-actions">
                <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-ghost">Edit</a>
                <form class="inline" action="{{ route('tasks.destroy', $task->id) }}" method="POST" onsubmit="return confirm('Delete this task?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-delete">Delete</button>
                </form>
            </div>
        </div>
    @empty
        <div class="empty">Nothing on your list yet. Add your first task above.</div>
    @endforelse
@endsection