@extends('layout.admin')
@section('content')
    <div class="container mx-auto mt-8">
        <div class="max-w-md mx-auto">
            <div class="bg-white p-6 rounded-md shadow-md">
                <h2 class="text-2xl font-semibold mb-6">Buat Pertanyaan Baru</h2>

                <form method="POST" action="{{ route('faq.store') }}">
                    @csrf

                    <div class="mb-4">
                        <label for="judul" class="block text-gray-700">Judul Pertanyaan</label>
                        <input id="judul" type="text"
                            class="form-input mt-1 block w-full @error('judul') border-red-500 @enderror" name="judul"
                            value="{{ old('judul') }}" required autofocus>
                        @error('judul')
                            <p class="text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="isi" class="block text-gray-700">Isi Pertanyaan</label>
                        <textarea id="isi" class="form-textarea mt-1 block w-full @error('isi') border-red-500 @enderror" name="isi"
                            rows="5" required>{{ old('isi') }}</textarea>
                        @error('isi')
                            <p class="text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex justify-between">
                        <button type="submit"
                            class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Simpan</button>
                        <a href="{{ route('faq.index') }}"
                            class="bg-gray-200 text-gray-700 px-4 py-2 rounded hover:bg-gray-300">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
