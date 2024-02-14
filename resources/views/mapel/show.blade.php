@extends('layout.app') <!-- Sesuaikan dengan layout aplikasi Anda -->

@section('content')
    <div class="mb-4">
        <a href="{{ route('reviews.create', ['mapel_id' => $mapel->id]) }}"
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Beri Review
        </a>
    </div>
@endsection
