@extends('layout.app')

@section('content')
    <style>
        .truncated-text {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            transition: all 300ms linear;
        }

        .truncated-text:hover {
            white-space: normal;
            overflow: visible;
            transition: all 300ms linear;
        }
    </style>

    @include('components.scroll')

    <div class="bg-gray-100 antialiased font-['Poppins']">
        @include('components.navbar-user')
        <div class="flex flex-col md:flex-row px-3 md:px-16 lg:px-28 gap-5 text-[#161931]">
            @include('components.profile-sidebar')
            <main class="w-full min-h-screen md:w-2/3 lg:w-3/4">
                <div class="p-4">
                    <h2 class="text-2xl font-bold sm:text-2xl">My Course</h2>

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mt-4">
                        @foreach ($mapel as $index => $item)
                            <a href="{{ route('materis.view', $item->mapels->id) }}">
                                <div id="mapel-list-{{ $index }}"
                                    class="rounded-3xl shadow-lg mapel-item hover:cursor-pointer">
                                    <div class="bg-white rounded-t-3xl overflow-hidden">
                                        <img src="{{ asset('/storage/mapels/' . $item->mapels->image) }}"
                                            alt="{{ $item->mapels->judul }}" class="object-cover w-full h-52">
                                    </div>
                                    <div class="p-4 flex flex-col">
                                        <h5 class="text-xl font-bold mt-3 text-gray-900 truncated-text">
                                            {{ $item->mapels->judul }}</h5>
                                        <h6 class="text-md font-normal text-gray-600">
                                            Rp.{{ number_format($item->mapels->harga, 2, ',', '.') }}</h6>
                                        <div class="flex justify-end items-end space-x-2">
                                            <i class="fa-duotone fa-signal-bars py-1 text-2xl font-bold"
                                                style="color: #506fff;"></i>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </main>
        </div>
    </div>
@endsection
