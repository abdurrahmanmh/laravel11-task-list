@extends('layouts.app')
@section('title', $task->title)
@section('content')

    <p>{{ $task->description }}</p>
    @if ($task->long_description)
        <p>{{ $task->long_description }}</p>
    @endif

    <p>{{ $task->created_at }}</p>
    <p>{{ $task->updated_at }}</p>

    <p>
        @if ($task->completed)
            Completed
            @else
            Not Completed
        @endif
    </p>

    <div>
        {{-- u can also remove id so it be ['task'=>$task] laravel knows the primary key --}}
        <a href="{{ route('tasks.edit', ['task' => $task->id]) }}">Edit</a>
    </div>

    <div>
<form action="{{route('tasks.toggle-complete',['task'=>$task])}}" method="post">
@csrf
@method('PUT')
<button type="submit">Marks As {{$task->completed ? 'Not completed' : 'Completed'}}</button>

</form>
    </div>

    <div>
        <form action= "{{ route('tasks.destroy', ['task' => $task->id]) }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
    </div>
@endsection
