@extends('layouts.app')


@section('title', 'Task List')
    
@section('content') 
    @forelse ($tasks as $task)
        {{-- <div>
            <h3>There are tasks</h3>
        </div> --}}
        {{-- @if (count($tasks)) --}}
        {{-- @foreach ($tasks as $task) --}}
        <div><a href="{{ route('tasks.show', ['task' => $task->id]) }}">{{ $task->title }}</a></div>
        {{-- @endforeach --}}
        {{-- @else --}}
    @empty
        <div>
            <h3>No Task yeay</h3>
        </div>
        {{-- @endif --}}
    @endforelse

    @if ($task->count())
        <nav>{{$tasks->links()}}   </nav>     
    @else
        
    @endif    

@endsection