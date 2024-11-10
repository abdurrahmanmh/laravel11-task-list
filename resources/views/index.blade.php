@extends('layouts.app')


@section('title', 'Task List')

@section('content')
    <nav class="mb-4">
        <a class="font-medium text-gray-700 underline decoration-pink-500" href="{{ route('tasks.create') }}">Create Task</a>
    </nav>

    @forelse ($tasks as $task)
        {{-- <div>
            <h3>There are tasks</h3>
        </div> --}}
        {{-- @if (count($tasks)) --}}
        {{-- @foreach ($tasks as $task) --}}
        <div><a href="{{ route('tasks.show', ['task' => $task->id]) }}" @class(['line-through' => $task->completed])>
                {{ $task->title }}
            </a></div>
        {{-- @endforeach --}}
        {{-- @else --}}
    @empty
        <div>
            <h3>No Task yeay</h3>
        </div>
        {{-- @endif --}}
    @endforelse

    @if ($task->count())
        <nav class="mt-4">{{ $tasks->links() }} </nav>
    @else
    @endif

@endsection
