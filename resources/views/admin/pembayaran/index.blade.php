<!-- resources/views/pembayaran/export.blade.php -->

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
                    <div>
                        <form action="{{ route('pembayaran.export') }}" method="GET" class="">
                            <div class="flex items-center">
                                <div class="mr-2">
                                    <label for="bulan">Bulan:</label>
                                    <select name="bulan" id="bulan" class="p-2">
                                        <option value="1">Januari</option>
                                        <option value="2">Februari</option>
                                        <option value="3">Maret</option>
                                        <option value="4">April</option>
                                        <option value="5">Mei</option>
                                        <option value="6">Juni</option>
                                        <option value="7">Juli</option>
                                        <option value="8">Agustus</option>
                                        <option value="9">September</option>
                                        <option value="10">Oktober</option>
                                        <option value="11">November</option>
                                        <option value="12">Desember</option>
                                        <!-- Tambahkan opsi bulan lainnya sesuai kebutuhan -->
                                    </select>
                                </div>
                                
                                <div>
                                    <label for="tahun">Tahun:</label>
                                    <input type="number" name="tahun" id="tahun" class="p-2"
                                        placeholder="Pilih tahun">
                                </div>

                                <button type="submit"
                                    class="ml-2 bg-emerald-400 hover:bg-emerald-600 text-white font-bold py-2 px-4 rounded my-8">
                                    <i class="fa-regular fa-file-excel text-xl"></i>
                                    <span>Excel</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <form action="{{ route('pembayaran.index') }}" method="GET" class="flex items-center">
                    <div class="mr-2">
                        <label for="bulan" >Bulan:</label>
                        <select name="bulan" id="bulan" class="p-2">
                            <option value="1" {{ $bulan == 1 ? 'selected' : '' }}>Januari</option>
                            <option value="2" {{ $bulan == 2 ? 'selected' : '' }}>Februari</option>
                            <option value="3" {{ $bulan == 3 ? 'selected' : '' }}>Maret</option>
                            <option value="4" {{ $bulan == 4 ? 'selected' : '' }}>April</option>
                            <option value="5" {{ $bulan == 5 ? 'selected' : '' }}>Mei</option>
                            <option value="6" {{ $bulan == 6 ? 'selected' : '' }}>Juni</option>
                            <option value="7" {{ $bulan == 7 ? 'selected' : '' }}>Juli</option>
                            <option value="8" {{ $bulan == 8 ? 'selected' : '' }}>Agustus</option>
                            <option value="9" {{ $bulan == 9 ? 'selected' : '' }}>September</option>
                            <option value="10" {{ $bulan == 10 ? 'selected' : '' }}>Oktober</option>
                            <option value="11" {{ $bulan == 11 ? 'selected' : '' }}>November</option>
                            <option value="12" {{ $bulan == 12 ? 'selected' : '' }}>Desember</option>
                            <!-- Tambahkan opsi bulan lainnya sesuai kebutuhan -->
                        </select>
                    </div>
                    <div class="mr-2">
                        <label for="tahun">Tahun:</label>
                        <input type="number" name="tahun" id="tahun" class="p-2" value="{{ $tahun }}">
                    </div>
                    <button type="submit" class="px-4 text-white py-2 bg-indigo-400 hover:bg-indigo-600 transition-colors duration-300 my-2 rounded-lg">Filter</button>
                </form>

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
                                                <div class="text-sm text-gray-900">Rp.
                                                    {{ number_format($pembayaran->harga, 2, ',', '.') }}</div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span
                                                    class="px-4 py-1 inline-flex text-xs leading-5 font-semibold rounded-full text-center 
                                            {{ $pembayaran->status == 'pending' ? 'bg-orange-200 text-orange-800' : ($pembayaran->status == 'failed' ? 'bg-red-200 text-red-800' : 'bg-green-100 text-green-800') }}">
                                                    {{ $pembayaran->status }}
                                                </span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="mt-2 flex ">
                        {{ $pembayarans->appends(['bulan' => $bulan, 'tahun' => $tahun])->links() }}
                    </div>
                </div>
            </main>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    </body>
@endsection
