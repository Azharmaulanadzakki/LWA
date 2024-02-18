@extends('layout.app')
@section('content')
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold mb-4">Edit Todo</h1>
        <form action="{{ route('todos.update', $todo->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="title" class="block">Title</label>
                <input type="text" name="title" id="title" class="border rounded w-full py-2 px-3"
                    value="{{ $todo->title }}" required>
            </div>
            <div class="mb-4">
                <label for="description" class="block">Description</label>
                <textarea name="description" id="description" class="border rounded w-full py-2 px-3" required>{{ $todo->description }}</textarea>
            </div>
            <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded">Update</button>
        </form>
    </div>
@endsection
