@extends('layout.admin')
@section('content')

    <body>
        <!-- component -->
        <section class="max-w-4xl p-6 mx-auto my-5">



            <form action="{{ route('materi.update', $materi->id) }}" method="post" enctype="multipart/form-data">
                @method('PUT')
                @csrf


                <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">

                    <!-- Judul -->
                    <div class="mb-4">
                        <label for="judul" class="block text-gray-700 text-sm font-bold mb-2">Judul</label>
                        <input type="text" name="judul" id="judul" class="w-full border rounded-md py-2 px-3"
                            value="{{ old('judul', $materi->judul ) }}">
                        @error('judul')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    {{-- tautan --}}
                    <div class="mb-4">
                        <label for="tautan" class="block text-gray-700 text-sm font-bold mb-2">link yt</label>
                        <textarea name="tautan" id="tautan" class="w-full border rounded-md py-2 px-3" rows="4">{{ old('tautan', $materi->tautan ) }}</textarea>
                        @error('isi')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- Isi -->
                    <div class="mb-4">
                        <label for="isi" class="block text-gray-700 text-sm font-bold mb-2">Isi</label>
                        <textarea name="isi" id="isi" class="w-full border rounded-md py-2 px-3" rows="4">{{ old('isi', $materi->isi ) }}</textarea>
                        @error('isi')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="flex mt-6 justify-start">
                    <button type="submit"
                        class="ring-2 ring-slate-700 font-semibold px-6 py-2 leading-5 text-gray-900 hover:text-white transition-colors duration-200 transform bg-white rounded-md hover:bg-gray-700 focus:outline-none focus:bg-gray-900">
                        Edit
                    </button>
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

        <script>
            function previewAndUpload() {
                var input = document.getElementById('gif');
                var preview = document.getElementById('preview');
                var progressBar = document.getElementById('upload-progress');

                var reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                };

                reader.readAsDataURL(input.files[0]);

                // Menggunakan FormData untuk mengirim file
                var formData = new FormData();
                formData.append('gif', input.files[0]);

                // Menggunakan Ajax untuk pengunggahan file dengan mendapatkan progress
                $.ajax({
                    url: '{{ route('materi.update', $materi->id) }}',
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    xhr: function() {
                        var xhr = new window.XMLHttpRequest();
                        xhr.upload.addEventListener('progress', function(e) {
                            if (e.lengthComputable) {
                                var percent = (e.loaded / e.total) * 100;
                                progressBar.value = percent;
                            }
                        }, false);
                        return xhr;
                    },
                    success: function(response) {
                        // File berhasil diunggah, lakukan sesuatu setelah pengunggahan selesai
                    },
                    error: function(xhr, status, error) {
                        // Tangani kesalahan pengunggahan
                    }
                });
            }
        </script>

        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>


    </body>
@endsection
