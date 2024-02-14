@extends('layout.admin')
@section('content')
    <body>
        <div class="container mx-auto mt-8">
            <div class="max-w-md mx-auto bg-white p-8 border border-gray-300 shadow-md rounded">
                <h2 class="text-2xl font-semibold mb-6">Tambah Pengguna Baru</h2>
    
                @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                        <strong>Whoops!</strong> Ada masalah dengan input Anda. Silakan periksa kembali.
                    </div>
                @endif
    
                <form action="{{ route('user.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
    
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-600">Nama</label>
                        <input type="text" name="name" id="name" class="mt-1 p-2 w-full border rounded-md"
                               value="" required>
                    </div>
    
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-600">Email</label>
                        <input type="email" name="email" id="email" class="mt-1 p-2 w-full border rounded-md"
                               value="" required>
                    </div>
    
                    <div class="mb-4">
                        <label for="password" class="block text-sm font-medium text-gray-600">Password</label>
                        <input type="password" name="password" id="password" class="mt-1 p-2 w-full border rounded-md"
                               required>
                    </div>
    
                    <div class="mb-4">
                        <label for="profile_image" class="block text-sm font-medium text-gray-600">Gambar Profil</label>
                        <input type="file" name="profile_image" id="profile_image"
                               class="mt-1 p-2 w-full border rounded-md">
                    </div>
    
                    <div class="mb-4">
                        <label for="role" class="block text-sm font-medium text-gray-600">Role</label>
                        <select name="role" id="role" class="mt-1 p-2 w-full border rounded-md" required>
                            <option value="admin">Admin</option>
                            <option value="user">User</option>
                        </select>
                    </div>
    
                    <div class="flex items-center justify-between">
                        <button type="submit" class="bg-blue-500 text-white p-2 rounded">Simpan</button>
                        <a href="{{ route('user.index') }}" class="text-gray-600">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </body>
@endsection