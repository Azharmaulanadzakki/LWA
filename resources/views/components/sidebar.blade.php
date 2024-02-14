<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

<div class="bg-gray-100">
    <div
        class="sidebar w-[3.35rem] h-full overflow-hidden border-r hover:w-56 hover:h-full hover:bg-white hover:shadow-lg">
        <div class="flex h-full flex-col justify-between pt-2 pb-6">
            <div>
                <ul class="mt-6 space-y-2 tracking-wide">
                    <li class="min-w-max">
                        <button class="group flex items-center space-x-6 px-4 py-3 text-gray-600 capitalize">
                            <i class="fas fa-user"></i>
                            <span class="-mr-1 font-bold">{{ Auth::user()->name }}</span>
                        </button>
                    </li>
                    <li class="min-w-max">
                        <a href="{{ route('admin.dashboard') }}" method="GET">
                            <button
                                class="group flex items-center space-x-6  px-4 py-3 text-gray-600 hover:bg-gray-600 w-full hover:text-white">
                                <i class="fa-solid fa-table-columns"></i>
                                <span class="mr-2">Dashboard</span>
                            </button>
                        </a>
                    </li>
                    <li class="min-w-max">
                        <a href="{{ route('mapel.index') }}" method="GET">
                            <button
                                class="group flex items-center space-x-6  px-4 py-3 text-gray-600 hover:bg-gray-600 w-full hover:text-white">
                                <i class="fa-solid fa-database"></i>
                                <span class="mr-2">Data Mapel</span>
                            </button>
                        </a>
                    </li>
                    <li class="min-w-max">
                        <a href="{{ route('materi.index') }}"
                            class="group flex items-center space-x-6 px-4 py-3 text-gray-600 hover:bg-gray-600 w-full hover:text-white">
                            <i class="fa-solid fa-book"></i>
                            <span class="group-hover:text-white">Data Materi</span>
                        </a>
                    </li>
                    <li class="min-w-max">
                        <a href="{{ route('tool.index') }}"
                            class="group flex items-center space-x-6 px-4 py-3  text-gray-600 hover:bg-gray-600 hover:text-white w-full">
                            <i class="fa-solid fa-toolbox"></i>
                            <span class="group-hover:text-white">Data Tools Materi</span>
                        </a>
                    </li>
                    <li class="min-w-max">
                        <a href="{{ route('user.index') }}" method="GET">
                            <button
                                class="group flex items-center space-x-5  px-4 py-3 text-gray-600 hover:bg-gray-600 w-full hover:text-white">
                                <i class="fas fa-user-edit"></i>
                                <span class="mr-1">Data User</span>
                            </button>
                        </a>
                    </li>
                    <li class="min-w-max">
                        <a href="{{ route('pembayaran.index') }}" method="GET">
                            <button
                                class="group flex items-center space-x-7  px-4 py-3 text-gray-600 hover:bg-gray-600 w-full hover:text-white">
                                <i class="fa-solid fa-file-invoice"></i>
                                <span class="mr-1">Data Payment</span>
                            </button>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="min-w-max">
                <a href="{{ route('admin.profile') }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button
                        class="group flex items-center space-x-4 px-4 py-3 text-gray-600 hover:bg-gray-600 hover:text-white w-full">
                        <i class="fa-solid fa-user-gear"></i>
                        <span class="group-hover:text-white">Edit Profile</span>
                    </button>
                </a>
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button
                        class="group flex items-center space-x-4 px-4 py-3 text-gray-600 hover:bg-gray-600 hover:text-white w-full">
                        <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            class="h-6 w-6">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                        <span class="group-hover:text-white">Logout</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
