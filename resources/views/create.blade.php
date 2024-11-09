@extends('layouts.app')

@section('title', 'Add Task')

@section('content')
{{$errors}}
    <form method="post" action="{{ route('tasks.store') }}">
        @csrf
        <div>
            <label for="title">Title</label>
            <input type="text" name="title" id="title">
        </div>

        <div>
            <label for="description">Decription</label>
            <textarea  name="description" id="description" rows="5"></textarea>
        </div>

        <div>
            <label for="long_description">Long Decription</label>
            <textarea name="long_description" id="long_description" rows="10"></textarea>
        </div>

        <div>
            <button type="submit">Submit</button>
        </div>
    </form>
@endsection
 