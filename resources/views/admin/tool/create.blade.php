@extends('layout.admin')
@section('content')

    <body>
        <!-- component -->
        <section class="max-w-4xl p-6 mx-auto my-5">



            <form action="{{ route('tool.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">

                    <!-- Judul -->
                    <div class="mb-4">
                        <label for="nama_tool" class="block text-gray-700 text-sm font-bold mb-2">Nama Tool</label>
                        <input type="text" name="nama_tool" id="nama_tool" class="w-full border rounded-md py-2 px-3"
                            value="{{ old('nama_tool') }}">
                        @error('nama_tool')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Description -->
                    <div class="mb-4">
                        <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description</label>
                        <textarea name="description" id="description" class="w-full border rounded-md py-2 px-3" rows="4">{{ old('description') }}</textarea>
                        @error('description')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="tautan" class="block text-gray-700 text-sm font-bold mb-2">Link source tautan</label>
                        <textarea name="tautan" id="tautan" class="w-full border rounded-md py-2 px-3" rows="4">{{ old('tautan') }}</textarea>
                        @error('tautan')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Input Gambar -->
                    <div class="mb-4">
                        <label for="image" class="block text-gray-700 text-sm font-bold mb-2">Image Tool</label>
                        <input type="file" name="image" id="image" class="w-full border rounded-md py-2 px-"
                            onchange="previewImage()">
                        <img id="preview" class="mt-2" style="max-width: 40%;">
                        <!-- Tampilkan pesan kesalahan jika ada -->
                        @error('image')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Parent Dropdown -->
                    <div class="mb-4">
                        <label for="parent_id" class="block text-gray-700 text-sm font-bold mb-2">Parent</label>
                        <select name="parent_id" id="parent_id" class="w-full border rounded-md py-2 px-3">
                            <option value="">Pilih Parent (Wajib)</option>
                            @foreach ($parents as $parent)
                                <option value="{{ $parent->id }}">{{ $parent->judul }}</option>
                            @endforeach
                        </select>
                    </div>

                </div>
                <div class="flex mt-6 justify-start">
                    <button type="submit"
                        class="ring-2 ring-slate-700 font-semibold px-6 py-2 leading-5 text-gray-900 hover:text-white transition-colors duration-200 transform bg-white rounded-md hover:bg-gray-700 focus:outline-none focus:bg-gray-900">Create</button>
                </div>
            </form>

        </section>

        <script>
            function previewImage() {
                var input = document.getElementById('image');
                var preview = document.getElementById('preview');

                var reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                };

                reader.readAsDataURL(input.files[0]);
            }
        </script>

    </body>
    
@endsection
