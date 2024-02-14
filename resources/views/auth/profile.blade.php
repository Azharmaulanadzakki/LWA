@extends('layout.app')

@section('content')
    @include('components.scroll')

    <body class="bg-gray-100 antialiased">

        @include('components.navbar-user')
        <div class=" w-full flex flex-col gap-5 px-3 md:px-16 lg:px-28 md:flex-row text-[#161931]">
            @include('components.profile-sidebar')
            <main class="w-full min-h-screen py-1 md:w-2/3 lg:w-3/">
                <div class="p-2 md:p-4">
                    <div class="w-full px-6 pb-8 mt-8 sm:max-w-xl sm:rounded-lg">
                        <h2 class="pl-6 text-2xl font-bold sm:text-xl">My Profile</h2>

                        <div class="grid max-w-2xl mx-auto mt-8">
                            <div class="flex flex-col items-center space-y-5 sm:flex-row sm:space-y-0">
                                <!-- Tampilkan gambar profil -->
                                <img class="object-cover w-40 h-40 p-1 rounded-full ring-2 ring-gray-400"
                                    src="{{ asset('storage/profile_images/' . $user->profile_image) }}"
                                    alt="Profile Picture">
                            </div>
                            
                            <!-- Tampilkan informasi profil lainnya -->
                            <div class="items-center mt-8 sm:mt-14 text-[#202142]">
                                <!-- Tambahkan informasi profil lainnya sesuai kebutuhan -->
                                <div class="flex flex-col space-y-5">
                                    <p class="font-semibold">Username</p>
                                    <div
                                        class="font-medium text-base bg-indigo-50 border border-indigo-300 text-indigo-900 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block py-2 px-5 w-full">
                                        {{ $user->name }}
                                    </div>
                                    <p class="font-semibold">Email</p>
                                    <div
                                        class="font-mediumtext-base bg-indigo-50 border border-indigo-300 text-indigo-900 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block py-2 px-5 w-full ">
                                        {{ $user->email }}
                                    </div>
                                    <p class="font-semibold">Bio</p>
                                    <div
                                        class="font-medium text-base bg-indigo-50 border border-indigo-300 text-indigo-900 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block py-4 px-5 w-full ">
                                        {{ $user->bio }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>

        {{-- edit profile --}}

        <div id="edit-section" class="container mx-auto my-24">
            <div class="max-w-md mx-auto bg-white p-6 rounded-md shadow-md">
                <h2 class="text-2xl font-semibold mb-6">Edit Profile</h2>

                @if (session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4"
                        role="alert">
                        <strong class="font-bold">Success!</strong>
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>
                @endif

                <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-600">Name</label>
                        <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}"
                            class="mt-1 p-2 w-full border rounded-md">
                        @error('name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-600">Email</label>
                        <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}"
                            class="mt-1 p-2 w-full border rounded-md">
                        @error('email')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="bio"
                            class="block mb-2 text-sm font-medium text-indigo-900">Bio</label>
                        <textarea id="bio" name="bio" rows="4"
                            class="block p-2.5 w-full text-sm text-indigo-90 rounded-lg border " placeholder="Write your bio here...">{{ old('bio', $user->bio) }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label for="profile_image" class="block text-sm font-medium text-gray-600">Profile Image</label>
                        <input type="file" name="profile_image" id="profile_image"
                            class="mt-1 p-2 w-full border rounded-md">
                        @error('profile_image')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mt-6">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Update Profile</button>
                    </div>
                </form>
            </div>
        </div>
    @endsection

</body>

<script>
    function scrollToEdit() {
        const toolsSection = document.getElementById('edit-section');

        if (toolsSection) {
            // Gunakan fungsi scrollIntoView untuk melakukan scroll ke elemen tersebut
            toolsSection.scrollIntoView({
                behavior: 'smooth'
            });
        }
    }
</script>
