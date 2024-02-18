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
                        <h2 class="pl-6 text-2xl font-bold sm:text-xl">
                            My Course
                        </h2>


                    </div>
                </div>
            </main>
        </div>
    @endsection

</body>
