@extends('layout.app')
@section('content')
    <div class="flex items-center justify-center py-20 px-40 mx-auto bg-white md:h-screen">
        <div class="flex justify-center items-center w-full">
            <div class="w-1/2 mx-40">
                <div class="flex flex-col">
                    <h1 class="text-[35px] font-bold leading-tight tracking-tight text-gray-900 mb-10 font-league">
                        Reset Password!
                    </h1>
                    <div>
                        @if (Session::get('success'))
                            <div class="flex items-center p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50"
                                role="alert">
                                <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                                </svg>
                                <span class="sr-only">Info</span>
                                <div>
                                    {{ Session::get('success') }}
                                </div>
                            </div>
                    </div>
                    @endif

                    @if (Session::get('error'))
                        <div class="flex items-center p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                            <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                            </svg>
                            <span class="sr-only">Info</span>
                            <div>
                                {{ Session::get('error') }}
                            </div>
                        </div>
                    @endif
                </div>

                <form class="space-y-4 md:space-y-6" action="" method="POST">
                    @csrf
                    <div class="border-2 border-gray-900 py-2 px-2 rounded-xl">
                        <input type="password" name="password" id="password"
                            class="text-gray-900 sm:text-sm outline-none block w-full p-2.5" placeholder="New Password"
                            required>
                        <span style="color: red">{{ $errors->first('password') }}</span>
                    </div>
                    <div class="border-2 border-gray-900 py-2 px-2 rounded-xl">
                        <input type="password" name="cpassword" id="password"
                            class="text-gray-900 sm:text-sm outline-none block w-full p-2.5" placeholder="Confirm Password"
                            required>
                    </div>
                     <button type="submit"
                        class="text-white bg-gray-700 hover:bg-gray-900 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-3 mt-3 text-center w-fit">
                        Reset Password
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
