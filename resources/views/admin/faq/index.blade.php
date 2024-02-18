@extends('layout.admin')
@section('content')

    <body class="flex bg-gray-100 min-h-screen">


        @include('components.sidebar')
        @include('sweetalert::alert')

        <div class="flex-grow text-gray-800">
            <main class="p-6 sm:p-10 space-y-2">
                <div class="flex flex-col space-y-6 md:space-y-0 md:flex-row justify-between">
                    <div class="mr-6">
                        <h1 class="text-4xl font-semibold mb-2">FAQ Page</h1>
                        <h2 class="text-gray-600 ml-0.5">Learn With Azhar UI/UX Course</h2>
                    </div>
                </div>
                <div class="flex flex-wrap items-start justify-end -mb-3">
                    <a href="{{ route('faq.create') }}" method="get">
                        <button
                            class="inline-flex px-5 py-3 text-white bg-purple-600 hover:bg-purple-700 rounded-md ml-6 mb-3">
                            <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                class="flex-shrink-0 h-6 w-6 text-white -ml-1 mr-2">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                            Create FAQ
                        </button>
                    </a>
                </div>

                <div class="container antialiased mx-auto mt-5">
                    <div class="relative justify-center items-center overflow-x-auto shadow-md sm:rounded-lg">
                        <table id="mapelTable" class="w-full text-sm text-left text-gray-500">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        ID
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        JUDUL
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Description
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($faqs as $faq)
                                    <tr class="bg-white border-b hover:bg-gray-50 ">
                                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                            {{ $faq->id }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $faq->judul }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $faq->isi }}
                                        </td>
                                        <td class="px-6 py-4 text-right flex justify-end">
                                            <a href="{{ route('faq.edit', ['faq' => $faq->id]) }}">
                                                <button
                                                    class="inline-flex items-center px-4 py-2 bg-indigo-500 hover:bg-indigo-600 text-white text-sm font-medium rounded-md mr-4">
                                                    Edit
                                                </button>
                                            </a>
                                            <form action="{{ route('faq.destroy', $faq->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="inline-flex items-center px-4 py-2 bg-red-500 hover:bg-red-600 text-white text-sm font-medium rounded-md mr-4">
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-2 flex bg-white">
                        {{ $faqs->links() }}
                    </div>
                </div>
            </main>
        </div>



        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>


    </body>
@endsection
