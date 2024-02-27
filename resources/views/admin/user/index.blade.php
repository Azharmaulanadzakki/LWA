@extends('layout.admin')
@section('content')

    <body class="flex bg-gray-100 min-h-screen">


        @include('components.sidebar')
        @include('sweetalert::alert')

        <div class="flex-grow text-gray-800">
            <main class="p-6 sm:p-10 space-y-2">
                <div class="flex flex-col space-y-6 md:space-y-0 md:flex-row justify-between">
                    <div class="mr-6">
                        <h1 class="text-4xl font-semibold mb-2">Data User</h1>
                        <h2 class="text-gray-600 ml-0.5">Learn With Azhar UI/UX Course</h2>
                    </div>
                </div>

                <form action="{{ route('users.index') }}" method="GET" class="flex items-start justify-start">
                    <div class="flex items-center">
                        <input type="text" name="search" class="p-2 border rounded-md mr-2" placeholder="Cari pengguna"
                            value="{{ request('search') }}">
                        <button type="submit" class="bg-blue-500 text-white px-5 py-2 rounded-md">Cari</button>
                    </div>
                </form>

                <div class="flex flex-wrap items-start justify-end -mb-3">
                    <form action="{{ route('user.create') }}" method="get">
                        <button
                            class="inline-flex px-5 py-3 text-white bg-purple-600 hover:bg-purple-700 rounded-md ml-6 mb-3">
                            <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                class="flex-shrink-0 h-6 w-6 text-white -ml-1 mr-2">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                            Create User
                        </button>
                    </form>
                </div>

                <div class="container antialiased mx-auto mt-5">
                    <div class="relative justify-center items-center overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        ID
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Name
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Email
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Role
                                    </th>
                                    <th scope="col" class="px-6 py-3">

                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr class="bg-white border-b hover:bg-gray-50">
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                            {{ $user->id }}
                                        </th>
                                        <td class="px-6 py-4">
                                            <div class="flex items-center">
                                                <div class="font-medium text-gray-800">{{ $user->name }}</div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $user->email }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $user->role }}
                                        </td>
                                        <td class="px-6 py-4 flex gap-2 justify-center text-right items-center">
                                            {{-- <form action="{{ route('user.edit', ['user' => $user->id]) }}">
                                                <button
                                                    class="inline-flex items-center px-4 py-2 bg-indigo-500 hover:bg-indigo-600 text-white text-sm font-medium rounded-md mr-4">
                                                    Edit
                                                </button>
                                            </form> --}}
                                            <form action="{{ route('user.destroy', $user->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="inline-flex items-center px-4 py-2 bg-red-500 hover:bg-red-600 text-white text-sm font-medium rounded-md mr-4">
                                                    Delete
                                                </button>
                                            </form>

                                            {{-- <a href="{{ route('user.edit', ['user' => $user->id]) }}"
                                                class="font-medium text-blue-600 hover:underline">Edit</a>

                                            <form action="{{ route('user.destroy', ['user' => $user->id]) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="font-medium text-red-600 hover:underline">
                                                    Delete
                                                </button>
                                            </form> --}}

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-2 flex ">
                        {{ $users->links() }}
                    </div>
                </div>
            </main>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        {{-- <script>
            function confirmDelete() {
                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Submit the form when the user confirms
                        document.getElementById('deleteForm').submit();
                    }
                });
            }
        </script> --}}
    </body>
@endsection
