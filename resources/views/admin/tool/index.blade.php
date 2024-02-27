@extends('layout.admin')
@section('content')

    <body class="flex bg-gray-100 min-h-screen">
        @include('components.sidebar')
        <div class="flex-grow text-gray-800">
            <main class="p-6 sm:p-10 space-y-2">
                <div class="flex flex-col space-y-6 md:space-y-0 md:flex-row justify-between">
                    <div class="mr-6">
                        <h1 class="text-4xl font-semibold mb-2">Data Tools</h1>
                        <h2 class="text-gray-600 ml-0.5">Learn With Azhar UI/UX Course</h2>
                    </div>
                </div>
                <div class="flex flex-wrap items-start justify-end -mb-3">
                    <form action="{{ route('tool.create') }}" method="get">
                        <button
                            class="inline-flex px-5 py-3 text-white bg-purple-600 hover:bg-purple-700 rounded-md ml-6 mb-3">
                            <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                class="flex-shrink-0 h-6 w-6 text-white -ml-1 mr-2">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                            Create Tools
                        </button>
                    </form>
                </div>

                <div>
                    <div class="container antialiased mx-auto mt-5">
                        <div class="relative justify-center items-center overflow-x-auto shadow-md sm:rounded-lg">
                            <table class="w-full text-sm text-left text-gray-500">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            ID
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            NAMA_TOOL
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            TAUTAN
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            MAPEL PARENT
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            IMAGE
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            
                                        </th>
                                        {{-- <th scope="col" class="px-6 py-3">
                                            <span class="sr-only">Edit</span>
                                        </th> --}}
                                    </tr>
                                </thead>
                                <tbody>

                                    @forelse ($tools as $tool)
                                        <tr class="bg-white border-b hover:bg-gray-50 ">
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                                {{ $tool->id }}
                                            </th>
                                            <td class="px-6 py-4">
                                                {{ $tool->nama_tool }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $tool->tautan }}
                                            </td>
                                            <td class="px-6 py-4 ">
                                                {{ optional($tool->mapel)->judul }}
                                            </td>
                                            <td class="px-6 py-4">
                                                <img src="{{ asset('/storage/tools/' . $tool->image) }}" alt=""
                                                    style="width: 50px">
                                            </td>

                                            <td class="px-6 py-4 text-right flex justify-end">
                                                {{-- <form action="{{ route('tool.edit', ['tool' => $tool->id]) }}">
                                                    <button
                                                        class="inline-flex items-center px-4 py-2 bg-indigo-500 hover:bg-indigo-600 text-white text-sm font-medium rounded-md mr-4">
                                                        Edit
                                                    </button>
                                                </form> --}}

                                                <form action="{{ route('tool.destroy', ['tool' => $tool->id]) }}"
                                                    method="POST" id="deleteForm">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" onclick="confirmDelete()"
                                                        class="inline-flex items-center px-4 py-2 bg-red-500 hover:bg-red-600 text-white text-sm font-medium rounded-md mr-4">Delete
                                                    </button>
                                                </form>
                                            </td>

                                        </tr>
                                    @empty
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
        </div>


        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script>
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
        </script>

    </body>
@endsection
