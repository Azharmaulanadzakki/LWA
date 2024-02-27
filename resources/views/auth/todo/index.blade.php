@extends('layout.app')

@section('content')
    @include('components.scroll')

    <body class="bg-gray-100 antialiased">

        @include('components.navbar-user')
        <div class=" w-full flex flex-col gap-5 px-3 md:px-16 lg:px-28 md:flex-row text-[#161931]">
            @include('components.profile-sidebar')
            <main class="w-full min-h-screen py-1 md:w-2/3 lg:w-full">
                <div class="p-2 md:p-4">
                    <div class="w-full px-6 pb-8 mt-8 sm:max-w-xl sm:rounded-lg">
                        <h2 class=" text-2xl font-bold sm:text-xl">
                            My To-do
                        </h2>
                        {{-- <a href="{{ route('todos.create') }}">
                            <button
                                class="bg-indigo-400 hover:bg-indigo-600 transition-colors duration-300 text-white py-2 px-4 mb-4 inline-block rounded mt-2">
                                <i class="fa-solid fa-plus mr-2"></i>
                                Todo
                            </button>
                        </a> --}}
                        <div class="my-6">
                            <form action="{{ route('todos.store') }}" class="flex  flex-col w-9/12 space-y-1" method="POST">
                                @csrf
                                <input type="text" name="title" placeholder="TODO's Tittle"
                                    class="border-2 border-gray-400 py-3 px-4 bg-gray-100 hover:bg-blue-100 rounded-xl my-2">
                                <textarea name="description" placeholder="TODO's Description"
                                    class=" border-2 border-gray-400 py-2 px-4 bg-gray-100 hover:bg-blue-100 text-gray-500 rounded-xl my-2"></textarea>
                                <button
                                    class="w-20 py-2 px-4 bg-blue-400 hover:bg-gradient-to-l from-blue-300 via-blue-300 to-blue-500 text-white  font-semibold  rounded-md"
                                    type="submit">
                                    Add
                                </button>
                            </form>
                        </div>
                        <div class="mt-2 border-2 border-gray-200 rounded-lg">
                            @if (count($todos) > 0)
                                @foreach ($todos as $todo)
                                    <!-- jika belum selesai centang berubah -->
                                    <div
                                        @class([
                                            'py-4 relative flex items-center border-b border-gray-300 px-3',
                                            $todo->done ? 'bg-green-200' : '',
                                        ])>
                                        <p
                                            class=" absolute right-52 {{ $todo->done ? 'text-blue-500 font-semibold' : 'text-red-500 font-semibold' }} ">
                                            {{ $todo->done ? "TODO's Done" : 'Not yet' }}</p>
                                        <div class="flex-1">
                                            <h3 class=" ml-5 text-xl font-semibold"> {{ $todo->title }} </h3>
                                            <p class=" ml-5 text-gray-500">{{ $todo->description }}</p>
                                        </div>
                                        <div class="flex space-x-3">
                                            <form method="POST" action="/todos/{{ $todo->id }}">
                                                @csrf
                                                @method('PATCH')
                                                <button
                                                    class="w-10 py-2 px-2 mr-7 bg-blue-400 hover:bg-gradient-to-l from-blue-300 via-blue-300 to-blue-500 text-white  font-semibold  rounded-md">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24"
                                                        style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;">
                                                        <path
                                                            d="m10 15.586-3.293-3.293-1.414 1.414L10 18.414l9.707-9.707-1.414-1.414z">
                                                        </path>
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>

                                        <div class="flex space-x-3">
                                            <form method="POST" action="/todos/{{ $todo->id }}">
                                                @csrf
                                                @method('DELETE')
                                                <button
                                                    class="w-10 py-2 px-2 mr-7 bg-red-400 hover:bg-gradient-to-r from-red-500 to-red-400 text-white  font-semibold  rounded-md">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <h3 class=" p-5 text-xl font-semibold text-red-500 text-center"> Belum ada To-do list </h3>
                            @endif
                        </div>
                    </div>
                </div>
        </div>
        </main>
        </div>
    @endsection

</body>
