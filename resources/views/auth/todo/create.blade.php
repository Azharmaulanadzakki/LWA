@extends('layout.app')
@section('content')
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold mb-4">Create Todo</h1>
        <form action="{{ route('todos.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="title" class="block">Title</label>
                <input type="text" name="title" id="title" class="border rounded w-full py-2 px-3" required>
            </div>
            <div class="mb-4">
                <label for="description" class="block">Description</label>
                <textarea name="description" id="description" class="border rounded w-full py-2 px-3" required></textarea>
            </div>
            <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded">Create</button>
        </form>
    </div>
@endsection
