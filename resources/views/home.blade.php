@extends('layout.app')
@section('content')
    @include('components.navbar-user')


    <body id="home-page" class="bg-slate-100 box-border antialiased">

        {{-- SnapToken Popup --}}
        {{-- <div id="snap-container"></div> --}}

        <!-- Hero Section -->
        <header class="text-gray-800 py-10 px-4 sm:px-8 md:px-16 lg:px-24">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                <!-- Bagian Teks -->
                <div class="md:col-span-1">
                    <p class="text-[#55c097] text-lg font-semibold text-left">#KeepLearning</p>
                    <h1
                        class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl mt-5 font-bold leading-tight text-left sm:w-[30rem]">
                        Hello {{ Auth::user()->name }}
                    </h1>
                    <p class="text-gray-400 text-lg text-left mt-5 ">
                        Kelas online kami menawarkan pengalaman pembelajaran yang mendalam dan interaktif untuk para calon
                        desainer UI/UX, <br> terutama mereka yang baru memulai perjalanan mereka dalam dunia desain
                        antarmuka
                        pengguna.
                        <br>
                    </p>

                    <div class="my-12">
                        <button onclick="scrollToCard()"
                            class="text-left font-bold inline-block bg-blue-500 hover:bg-blue-600 text-white py-2 px-6 sm:px-8 rounded-full text-base sm:text-lg md:text-base lg:text-lg xl:text-base transition duration-300">
                            Get Started
                        </button>
                    </div>

                </div>

                <!-- Bagian Gambar -->
                <div class="relative hidden md:block col-span-1">
                    <div
                        class="absolute top-0 -left-4 w-[22rem] h-[22rem] bg-purple-300 rounded-full mix-blend-multiply filter blur-xl opacity-100 animate-blob">
                    </div>
                    <div
                        class="absolute top-0 -right-4 w-[22rem] h-[22rem] bg-yellow-300 rounded-full mix-blend-multiply filter blur-xl opacity-100 animate-blob animation-delay-2000">
                    </div>
                    <div
                        class="absolute -bottom-8 left-20 w-[22rem] h-[22rem] bg-pink-300 rounded-full mix-blend-multiply filter blur-xl opacity-100 animate-blob animation-delay-4000">
                    </div>
                    <img src="{{ asset('img/fix.webp') }}" class="img-fluid z-10 relative" alt="">
                </div>
            </div>

            <div class="col-lg-12 col-12 text-center mt-40">
                <img src="{{ asset('img/brands.png') }}" alt="">
            </div>

            @include('components.step')

        </header>

        <section class="mx-4 sm:mx-8 md:mx-16 lg:mx-24">
            <div class="container mx-auto py-8 sm:py-16 px-4">
                <h1 id="card-section" class="text-2xl sm:text-4xl font-semibold mb-4 sm:mb-8 text-center">
                    Discover a most popular Online Course
                </h1>

                <div class="flex items-center justify-center">
                    <form action="{{ route('home.index') }}" method="GET">
                        <div
                            class="mx-auto relative bg-white min-w-sm max-w-2xl flex flex-col sm:flex-row items-center justify-center border py-2 px-2 rounded-2xl gap-2 shadow-2xl focus-within:border-gray-300">
                            <input type="text" name="search" value="{{ $search }}" placeholder="Search course"
                                class="px-4 sm:px-6 py-2 w-full rounded-md flex-1 outline-none bg-white">
                            <button type="submit"
                                class="w-full sm:w-auto px-4 sm:px-6 py-3 bg-black border-black text-white fill-white active:scale-110 duration-300 border will-change-transform overflow-hidden relative rounded-xl transition-all disabled:opacity-70">
                                <div class="relative">
                                    <div class="flex items-center transition-all opacity-1 valid:"><span
                                            class="text-sm font-semibold whitespace-nowrap truncate mx-auto">
                                            Search
                                        </span>
                                    </div>
                                </div>
                            </button>
                        </div>
                    </form>
                </div>

            </div>

            <div class="mx-4 sm:mx-8 my-6">

                <div id="results-section" class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4 ">
                    @include('components.card')
                </div>

                <div class="mt-10">
                    <button id="showMoreBtn"
                        class="my-3 rounded-md px-4 sm:px-9 py-2 bg-black text-white font-semibold hover:bg-gray-900 duration-300">
                        Show More
                    </button>
                    <button id="lessMoreBtn" style="display: none; "
                        class="my-3 rounded-md px-4 sm:px-9 py-2 bg-black text-white font-semibold hover:bg-gray-900 duration-300">
                        Less More
                    </button>
                </div>
            </div>

            @include('components.about')
        </section>

        @include('components.scroll')
        @include('components.infinite-scroll')
        @include('components.faq')
        @include('components.footer')

        {{-- script show more --}}
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const mapelItems = document.querySelectorAll(".mapel-item");
                const showMoreBtn = document.getElementById("showMoreBtn");
                const lessMoreBtn = document.getElementById("lessMoreBtn");
                const seacrhBtn = document.getElementById("seacrhBtn");

                // Semua elemen dengan indeks lebih besar dari 7 akan disembunyikan
                mapelItems.forEach((item, index) => {
                    if (index > 7) {
                        item.style.display = "none";
                    }
                });

                // Tambahkan event listener pada tombol "Show More"
                showMoreBtn.addEventListener("click", function() {
                    mapelItems.forEach((item, index) => {
                        item.style.display = "block";
                    });
                    // Sembunyikan tombol "Show More" dan tampilkan tombol "Less More"
                    showMoreBtn.style.display = "none";
                    lessMoreBtn.style.display = "block";
                });

                // Tambahkan event listener pada tombol "Less More"
                lessMoreBtn.addEventListener("click", function() {
                    // Semua elemen dengan indeks lebih besar dari 7 akan disembunyikan
                    mapelItems.forEach((item, index) => {
                        if (index > 7) {
                            item.style.display = "none";
                        }
                    });
                    // Tampilkan tombol "Show More" dan sembunyikan tombol "Less More"
                    showMoreBtn.style.display = "block";
                    lessMoreBtn.style.display = "none";
                    seacrhBtn.style.display = "none";
                });

                // Tambahkan event listener pada tombol "Seach"
                seacrhBtn.addEventListener("click", function() {
                    // Tampilkan tombol "Show More" dan sembunyikan tombol "Less More"
                    showMoreBtn.style.display = "block";
                    lessMoreBtn.style.display = "none";
                });
            });
        </script>

        <script>
            function scrollToCard() {
                const aboutSection = document.getElementById('card-section');

                if (aboutSection) {
                    // Gunakan fungsi scrollIntoView untuk melakukan scroll ke elemen tersebut
                    aboutSection.scrollIntoView({
                        behavior: 'smooth'
                    });
                }
            }
        </script>

        <script>
            window.onload = function() {
                // Cek apakah terdapat parameter search pada URL
                const searchParam = new URLSearchParams(window.location.search).get('search');

                if (searchParam) {
                    // Jika parameter search ada, gulirkan halaman ke hasil pencarian
                    const resultsSection = document.getElementById('results-section');

                    if (resultsSection) {
                        resultsSection.scrollIntoView({
                            behavior: 'smooth'
                        });
                    }
                }
            };
        </script>


    </body>
@endsection
