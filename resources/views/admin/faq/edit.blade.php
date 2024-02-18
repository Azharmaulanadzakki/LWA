@extends('layout.admin')
@section('content')
    <div class="container mx-auto mt-8">
        <h2 class="text-2xl font-bold mb-4">Edit FAQ</h2>
        <form action="{{ route('faq.update', $faq->id) }}" method="POST" class="max-w-md">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="judul" class="block text-gray-700 font-bold mb-2">Judul</label>
                <input type="text" name="judul" id="judul" value="{{ $faq->judul }}"
                    class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-500">
            </div>
            <div class="mb-4">
                <label for="isi" class="block text-gray-700 font-bold mb-2">Isi</label>
                <textarea name="isi" id="isi" rows="5"
                    class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-500">{{ $faq->isi }}</textarea>
            </div>
            <div class="flex justify-end">
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Simpan
                    Perubahan</button>
            </div>
        </form>
    </div>
@endsection
