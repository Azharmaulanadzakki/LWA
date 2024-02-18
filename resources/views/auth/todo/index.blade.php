@extends('layout.app')

@section('content')
    @include('components.scroll')

    <body class="bg-gray-100 antialiased">

        @include('components.navbar-user')
        <div class=" w-full flex flex-col gap-5 px-3 md:px-16 lg:px-28 md:flex-row text-[#161931]">
            @include('components.profile-sidebar')
            <main class="w-full min-h-screen py-1 md:w-2/3 lg:w-3/">
                <div class="p-2 md:p-4">
                    <div class="w-full px-6 pb-8 mt-8 sm:max-w-xl sm:rounded-lg">
                        <h2 class=" text-2xl font-bold sm:text-xl">
                            My To-do
                        </h2>
                        <a href="{{ route('todos.create') }}">
                            <button
                                class="bg-indigo-400 hover:bg-indigo-600 transition-colors duration-300 text-white py-2 px-4 mb-4 inline-block rounded mt-2">
                                <i class="fa-solid fa-plus mr-2"></i>
                                Todo
                            </button>
                        </a>
                        <ul>
                            @foreach ($todos as $todo)
                            <li class="mb-2">
                                    {{ $todo->title }}
                                    <a href="{{ route('todos.edit', $todo->id) }}"
                                        class="bg-yellow-500 text-white py-1 px-2 rounded">Edit</a>
                                    <form action="{{ route('todos.destroy', $todo->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="bg-red-500 text-white py-1 px-2 rounded">Delete</button>
                                    </form>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </main>
        </div>
    @endsection

</body>
