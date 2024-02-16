@extends('layout.admin')
@section('content')

    <body class="flex bg-gray-100 min-h-screen">


        @include('components.sidebar')
        @include('sweetalert::alert')

        <div class="flex-grow text-gray-800">
            <header class="flex items-center h-20 px-6 sm:px-10 bg-white">



            </header>
            <main class="p-6 sm:p-10 space-y-2">
                <div class="flex flex-col space-y-6 md:space-y-0 md:flex-row justify-between">
                    <div class="mr-6">
                        <h1 class="text-4xl font-semibold mb-2">Data Payment</h1>
                        <h2 class="text-gray-600 ml-0.5">Learn With Azhar UI/UX Course</h2>
                    </div>
                </div>

                {{-- <form action="{{ route('pembayaran.index') }}" method="GET" class="flex items-start justify-start ">
                    <div class="flex items-center">
                        <input type="text" name="search" class="p-2 border rounded-md mr-2"
                            placeholder="Cari pembayaran" value="{{ request('search') }}">
                        <button type="submit" class="bg-blue-500 text-white px-5 py-2 rounded-md">Cari</button>
                    </div>
                </form> --}}


                <div class="container antialiased mx-auto mt-5">
                    <div class="relative justify-center items-center overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        ID
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Tanggal
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Mapel
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        User
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Harga
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Status
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pembayarans as $pembayaran)
                                    <tr class="bg-white border-b hover:bg-gray-50">
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                            {{ $pembayaran->id }}
                                        </th>
                                        <td class="px-6 py-4">
                                            <div class="flex items-center">
                                                <div class="font-medium text-gray-800">{{ $pembayaran->tanggal }}</div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $pembayaran->mapels->judul }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $pembayaran->users->name }}
                                        </td>
                                        <td class="px-6 py-4">
                                            Rp. {{ $pembayaran->harga }}
                                        </td>
                                        <td class="px-6 py-4">
                                            div
                                            {{ $pembayaran->status == 0 ? 'Pending' : 'Selesai' }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-2 flex ">
                        {{ $pembayarans->links() }}
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
