<!-- Navbar -->
<nav class="navbar bg-transparent p-6">
    <div class="container mx-auto">
        <div class="flex justify-between items-center">
            <a href="#" class="text-gray-900 text-2xl font-bold">DesignedForYou</a>
            {{-- <ul class="flex space-x-4">
                  <li><a href="#" class="text-gray-900 font-semibold">Beranda</a></li>
                  <li><a href="#" class="text-gray-900 font-semibold">Kursus</a></li>
                  <li><a href="#" class="text-gray-900 font-semibold">Kontak</a></li>
                </ul> --}}
            <form action="{{ route('logout') }}" method="POST" class="d-flex" role="search">
                @csrf
                @method('DELETE')
                <button
                    class="relative p-2 text-gray-400 hover:bg-gray-100 hover:text-gray-600 focus:bg-gray-100 focus:text-gray-600 rounded-full">
                    <span class="sr-only">Log out</span>
                    <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                </button>
            </form>
        </div>
    </div>
</nav>
