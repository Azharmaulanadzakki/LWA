@extends('layout.admin')
@section('content')

    <body>
        <script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
        <!-- component -->
        <section class="max-w-4xl p-10 mx-auto my-5">

            <form action="{{ route('materi.store') }}" method="post" enctype="multipart/form-data" value="{{ csrf_token() }}">

                @csrf

                <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">

                    <!-- Judul -->
                    <div class="mb-4">
                        <label for="judul" class="block text-gray-700 text-sm font-bold mb-2">Judul</label>
                        <input type="text" name="judul" id="judul" class="w-full border rounded-md py-2 px-3"
                            value="{{ old('judul') }}">
                        @error('judul')
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


                    <div class="mb-4">
                        <label for="tautan" class="block text-gray-700 text-sm font-bold mb-2">link yt</label>
                        <textarea name="tautan" id="tautan" class="w-full border rounded-md py-2 px-3" rows="2">{{ old('tautan') }}</textarea>
                        @error('isi')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                </div>

                <!-- Isi -->
                <div class="mb-4">
                    <label for="isi" class="block text-gray-700 text-sm font-bold mb-2">Isi</label>
                    <textarea id="isi" name="isi" class="w-full border-2 rounded py-2 px-3 h-64" rows="">{{ old('isi') }}</textarea>
                    @error('isi')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>


                <div class="flex mt-6 justify-start">
                    <button type="submit"
                        class="ring-2 ring-slate-700 font-semibold px-6 py-2 leading-5 text-gray-900 hover:text-white transition-colors duration-200 transform bg-white rounded-md hover:bg-gray-700 focus:outline-none focus:bg-gray-900">Create</button>
                </div>
            </form>

        </section>

        <script>
            function previewImage() {
                var input = document.getElementById('gif');
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
