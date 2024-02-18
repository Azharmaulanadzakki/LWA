@extends('layout.admin')
@section('content')

<body class="flex bg-gray-100 min-h-screen">


    @include('components.sidebar')
    @include('sweetalert::alert')

    <div class="flex-grow text-gray-800">
        <main class="p-6 sm:p-10 space-y-2">
            <div class="flex flex-col space-y-6 md:space-y-0 md:flex-row justify-between">
                <div class="mr-6">
                    <h1 class="text-4xl font-semibold mb-2">Data Payment</h1>
                    <h2 class="text-gray-600 ml-0.5">Learn With Azhar UI/UX Course</h2>
                </div>
            </div>

            <a href="{{ route('pembayaran.export') }}"
                class="">
                <button class="bg-emerald-400 hover:bg-emerald-600 text-white font-bold py-2 px-4 rounded my-8">
                    <i class="fa-regular fa-file-excel text-xl"></i>
                    <span>Excel</span>
                </button>
            </a>

            <div class="container antialiased mx-auto mt-5">
                <div class="relative justify-center items-center overflow-x-auto shadow-md sm:rounded-lg">
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        ID
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Tanggal
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Mapel
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        User
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Harga
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Status
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($pembayarans as $pembayaran)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{ $pembayaran->id }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{ $pembayaran->tanggal }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{ $pembayaran->mapels->judul }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{ $pembayaran->users->name }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">Rp. {{ $pembayaran->harga }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $pembayaran->status == 0 ? 'bg-red-100 text-red-800' : 'bg-green-100 text-green-800' }}">
                                            {{ $pembayaran->status == 0 ? 'Pending' : 'Success' }}
                                        </span>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
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
